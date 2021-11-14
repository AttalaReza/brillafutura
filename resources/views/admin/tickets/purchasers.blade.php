@extends('admin.app')

@section('title', 'Pembeli Tiket - Admin')

@section('user')
{{ $data['user']->name }}
@endsection

@section('content')

<main>
    <div class="container-fluid">
        <h1 class="mt-4">{{ $data['event']->name }}
            <!-- <div class="float-right">
                <a title="Back to Tickets Page" class="btn btn-secondary" href="{{ route('tickets.index') }}">Back</a>
            </div> -->
        </h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Pembeli Tiket {{ $data['event']->name }}</li>
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
            <a title="Download Excel Data Pembeli" class="btn btn-success" href="{{ route('purchasers.export', ['id' => $data['event']->id, 'key' => $data['key'] ]) }}"><i class="fas fa-download mr-1"></i> Excel</a>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <h4><i class="fas fa-info-circle mr-1"></i>Data Detail</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Kategori</th>
                                <th>Terjual</th>
                                <th>Stok</th>
                                <th>Pendapatan</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Total</th>
                                @php ($total = number_format($data['details']['presale_1_sold'] + $data['details']['presale_2_sold'] + $data['details']['onsale_sold']))
                                <th>{{ $total }} Tiket</th>
                                @php ($total = number_format($data['details']['presale_1_remaining'] + $data['details']['presale_2_remaining'] + $data['details']['onsale_remaining']))
                                <th>{{ $total }} Tiket</th>
                                @php ($total = number_format($data['details']['presale_1'] + $data['details']['presale_2'] + $data['details']['onsale']))
                                <th>Rp {{ $total }}</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <tr>
                                <td>Presale 1</td>
                                <td>{{ $data['details']['presale_1_sold'] }}</td>
                                <td>{{ $data['details']['presale_1_remaining'] }}</td>
                                @php ($t = number_format($data['details']['presale_1']))
                                <td><b>Rp {{ $t }}</b></td>
                            </tr>
                            <tr>
                                <td>Presale 2</td>
                                <td>{{ $data['details']['presale_2_sold'] }}</td>
                                <td>{{ $data['details']['presale_2_remaining'] }}</td>
                                @php ($t = number_format($data['details']['presale_2']))
                                <td><b>Rp {{ $t }}</b></td>
                            </tr>
                            <tr>
                                <td>Onsale</td>
                                <td>{{ $data['details']['onsale_sold'] }}</td>
                                <td>{{ $data['details']['onsale_remaining'] }}</td>
                                @php ($t = number_format($data['details']['onsale']))
                                <td><b>Rp {{ $t }}</b></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <h4><i class="fas fa-table mr-1"></i>Data Pembeli Tiket</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Waktu Beli</th>
                                <th>Pembeli</th>
                                <th>Kategori</th>
                                <th>Harga Tiket</th>
                                <th>Jumlah</th>
                                <th>Total</th>
                                <th>Kode</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Waktu Beli</th>
                                <th>Pembeli</th>
                                <th>Kategori</th>
                                <th>Harga Tiket</th>
                                <th>Jumlah</th>
                                <th>Total</th>
                                <th>Kode</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($data['payments'] as $payment)
                            <tr>
                                <td>{{ $payment->date }}<br />{{ $payment->time }}</td>
                                <td>{{ $payment->user->name }}</td>
                                <td>{{ $payment->purchase->ticket }}</td>
                                <td>{{ $payment->ticket_price }}</td>
                                <td>{{ $payment->purchase->amount }} tiket</td>
                                <td><b>{{ $payment->payment_amount }}</b></td>
                                <td class="text-center" width="200">
                                    <a title="Ticket Code" class="btn btn-success btn-sm">{{ $payment->purchase->code }}</a>
                                    <a title="Invoice" class="btn btn-primary btn-sm mt-1" type="button" href="{{ route('invoice.export', ['id' => $payment->id, 'key' => $payment->key ]) }}"><i class="fas fa-download mr-1"></i> Invoice</a>
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
