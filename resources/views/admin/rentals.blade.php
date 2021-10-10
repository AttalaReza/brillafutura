@extends('admin.app')

@section('title', 'Penyewaan Alat - Admin')

@section('user')
{{ $data['user']->name }}
@endsection

@section('content')

<main>
    <div class="container-fluid">
        <h1 class="mt-4">Penyewaan Alat</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Penyewaan Alat</li>
        </ol>
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        @if (session('failed'))
        <div class="alert alert-danger">
            {{ session('failed') }}
        </div>
        @endif
        <div class="card mb-4">
            <div class="card-body">
                <form action="{{ route('rentals.export') }}" method="POST">
                    @csrf
                    <label>Download data Excel, Silakan pilih bulan dan tahun</label>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-5">
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text">Bulan</span>
                                    </div>
                                    <select class="custom-select" id="month" name="month" required>
                                        <option selected disabled value="0">Pilihlah ...</option>
                                        <option value="1">Januari</option>
                                        <option value="2">Februari</option>
                                        <option value="3">Maret</option>
                                        <option value="4">April</option>
                                        <option value="5">Mei</option>
                                        <option value="6">Juni</option>
                                        <option value="7">Juli</option>
                                        <option value="8">Agustus</option>
                                        <option value="9">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                        <option value="13">Sepanjang Tahun</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text">Tahun</span>
                                    </div>
                                    <input class="form-control" id="year" name="year" type="number" placeholder="4 digits" minlength="4" maxlength="4" required />
                                </div>
                            </div>
                            <div class="col-2">
                                <button type="submit" title="Download Excel Data Penyewa" class="btn btn-success btn-block" href=><i class="fas fa-download mr-1"></i> Excel</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <h4><i class="fas fa-table mr-1"></i>Data Penyewaan Alat</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Tanggal Bayar</th>
                                <th>Penyewa</th>
                                <th>Alat</th>
                                <th>Tanggal Sewa</th>
                                <th>Lokasi</th>
                                <th>Biaya</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Tanggal Bayar</th>
                                <th>Penyewa</th>
                                <th>Paket</th>
                                <th>Tanggal Sewa</th>
                                <th>Lokasi</th>
                                <th>Biaya</th>
                                <th>Status</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($data['payments'] as $payment)
                            <tr>
                                <td>{{ $payment->date }} <br /><br />{{ $payment->type }}</td>
                                <td>{{ $payment->rental->user->name }} <br /><br />{{ $payment->rental->user->phone }}</td>
                                <td>{{ $payment->rental->tool->name }} <br /><br />Rp {{ $payment->tool_cost }}</td>
                                <td>{{ $payment->rental->date }}</td>
                                <td>{{ $payment->rental->location }}</td>
                                <td>
                                    <b>Rp {{ $payment->payment_amount }}</b>
                                    @if ($payment->rental->status == "dp")
                                    <br /><br />Sudah DP: <br />Rp {{ $payment->payment_paid }}
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if ($payment->rental->status == "lunas")
                                    <button title="Telah Lunas" class="btn btn-success btn-sm" onclick="return alert('Penyewaan ini telah LUNAS pada pukul {{ $payment->update }}')">Lunas</button>
                                    <br />
                                    @else
                                    <form action="{{ route('rental.status', ['id' => $payment->rental->id]) }}" method="POST">
                                        @csrf
                                        <button title="Ubah ke Lunas" type="submit" class="btn btn-warning btn-sm" onclick="return confirm('Apakah Anda yakin ingin mengubah status penyewaan menjadi LUNAS?')">Ubah ke Lunas?</button>
                                    </form>
                                    @endif
                                    <a title="Download" class="btn btn-primary btn-sm mt-1" href="#"><i class="fas fa-download mr-1"></i> Invoice</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
