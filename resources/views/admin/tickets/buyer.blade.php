@extends('admin.app')

@section('title', 'Pembeli Tiket - Admin')

@section('user')
{{"Reza"}}
@endsection

@section('content')

<main>
    <div class="container-fluid">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Pembeli Tiket Konser 123</li>
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
                <h4><i class="fas fa-table mr-1"></i>Data Pembeli Tiket</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Waktu</th>
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
                                <th>Waktu</th>
                                <th>Pembeli</th>
                                <th>Kategori</th>
                                <th>Harga Tiket</th>
                                <th>Jumlah</th>
                                <th>Total</th>
                                <th>Kode</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <tr>
                                <td>10:00</br>29 Agustus 2021</td>
                                <td>Rafif</td>
                                <td>Presale 1</td>
                                <td>100,000</td>
                                <td>3 Tiket</td>
                                <td><b>300,000</b></td>
                                <td class="text-center">
                                    <a class="btn btn-success btn-sm">RF450GP300</a>
                                </td>
                            </tr>
                            <tr>
                                <td>12:00</br>3 Sept 2021</td>
                                <td>Khairi</td>
                                <td>Presale 2</td>
                                <td>120,000</td>
                                <td>1 Tiket</td>
                                <td><b>120,000</b></td>
                                <td class="text-center">
                                    <a class="btn btn-success btn-sm m-1">KH120GP400</a>
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
