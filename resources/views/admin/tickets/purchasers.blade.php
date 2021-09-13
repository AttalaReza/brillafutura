@extends('admin.app')

@section('title', 'Pembeli Tiket - Admin')

@section('user')
{{ $data['user']->name }}
@endsection

@section('content')

<main>
    <div class="container-fluid">
        <h1 class="mt-4">Dashboard</h1>
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
            <div class="card-header">
                <h4><i class="fas fa-table mr-1"></i>Data Pembeli Tiket {{ $data['event']->name }}
                    <div class="float-right">
                        <a class="btn btn-secondary btn-sm" href="{{ route('tickets.index') }}">Back</a>
                    </div>
                </h4>
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
                                @php ($time = date("G:i", strtotime($payment->created_at)))
                                @php ($date = date("d M Y", strtotime($payment->created_at)))
                                <td>{{ $time }}</br>{{ $date }}</td>
                                <td>{{ $payment->user->name }}</td>
                                <td>{{ $payment->purchase->ticket }}</td>
                                @php ($tp = number_format($payment->purchase->ticket_price))
                                <td>{{ $tp }}</td>
                                <td>{{ $payment->purchase->amount }} tiket</td>
                                @php ($pa = number_format($payment->purchase->payment_amount))
                                <td><b>{{ $pa }}</b></td>
                                <td class="text-center">
                                    <a class="btn btn-success btn-sm">{{ $payment->purchase->code }}</a>
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
