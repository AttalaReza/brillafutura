@extends('admin.app')

@section('title', 'Penyewaan Alat - Admin')

@section('user')
{{ $data['user']->name }}
@endsection

@section('content')

<main>
    <div class="container-fluid">
        <h1 class="mt-4">Dashboard</h1>
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
            <div class="card-header">
                <h4><i class="fas fa-table mr-1"></i>Data Penyewaan Alat</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Penyewa</th>
                                <th>Paket</th>
                                <th>Tanggal Sewa</th>
                                <th>Durasi</th>
                                <th>Lokasi</th>
                                <th>Biaya</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Penyewa</th>
                                <th>Paket</th>
                                <th>Tanggal Sewa</th>
                                <th>Durasi</th>
                                <th>Lokasi</th>
                                <th>Biaya</th>
                                <th>Status</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($data['payments'] as $payment)
                            <tr>
                                <td>{{ $payment->rental->user->name }}</td>
                                @php ($pp = number_format($payment->rental->tool->price))
                                <td>{{ $payment->rental->tool->name }}</br>{{ $pp }}</td>
                                @isset ($payment->rental->end_date)
                                @if ($payment->rental->start_date == $payment->rental->end_date)
                                @php ($date = date("j M Y", strtotime($payment->rental->start_date)))
                                @else
                                @php ($date = date("j", strtotime($payment->rental->start_date)) . "-" . date("j M Y", strtotime($payment->rental->end_date)))
                                @endif
                                @endisset
                                @empty ($payment->rental->end_date)
                                @php ($date = date("j M Y", strtotime($payment->rental->start_date)))
                                @endempty
                                <td>{{ $date }}</td>
                                <td>{{ $payment->rental->duration }} hari</td>
                                <td>{{ $payment->rental->location }}</td>
                                @php ($pa = number_format($payment->rental->payment_amount))
                                <td><b>{{ $pa }}</b></td>
                                <td class="text-center">
                                    @if ($payment->rental->status == "lunas")
                                    @php ($d = date("H:i, j M Y", strtotime($payment->rental->updated_at)))
                                    <button title="Telah Lunas" class="btn btn-success btn-sm" onclick="return alert('Penyewaan ini telah LUNAS pada {{ $d }}')">Lunas</button>
                                    @else
                                    <form action="{{ route('rental.status', ['id' => $payment->rental->id]) }}" method="POST">
                                        @csrf
                                        <button title="Ubah ke Lunas" type="submit" class="btn btn-warning btn-sm" onclick="return confirm('Apakah Anda yakin ingin mengubah status penyewaan menjadi LUNAS?')">Sudah DP 50%</button>
                                    </form>
                                    @endif
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
