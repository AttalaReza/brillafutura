@extends('admin.app')

@section('title', 'Pembelian Tiket - Admin')

@section('user')
{{"Reza"}}
@endsection

@section('content')

<main>
    <div class="container-fluid">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Pembelian Tiket</li>
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
                <h4><i class="fas fa-table mr-1"></i>Data Pembelian Tiket</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Sponsor</th>
                                <th>Event</th>
                                <th>Lokasi</th>
                                <th>Tanggal Event</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Sponsor</th>
                                <th>Event</th>
                                <th>Lokasi</th>
                                <th>Tanggal Event</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <tr>
                                <td>Angkasa</td>
                                <td>Konser 123</td>
                                <td>Garden Palace</td>
                                <td>1 - 2 Sept 2021</td>
                                <td class="text-center">
                                    <a title="Daftar Pembeli" class="btn btn-info btn-sm m-1" href="/tickets/purchasers">Pembeli</a>
                                </td>
                            </tr>
                            <tr>
                                <td>BEM FILKOM UB</td>
                                <td>Konser 456</td>
                                <td>Samantha Krida</td>
                                <td>31 Agust 2021</td>
                                <td class="text-center">
                                    <a title="Daftar Pembeli" class="btn btn-info btn-sm m-1" href="/tickets/purchasers">Pembeli</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
