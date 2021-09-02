@extends('admin.app')

@section('title', 'Penyewaan Alat - Admin')

@section('user')
{{"Reza"}}
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
                                <th>Aksi</th>
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
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <tr>
                                <td>Reza</td>
                                <td>Paket Pesta 1</td>
                                <td>10 Sept 2021</td>
                                <td>1 hari</td>
                                <td>FILKOM UB</td>
                                <td>7,000,000</td>
                                <td class="text-center">
                                    <form action="#" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button title="Terlunasi" type="submit" class="btn btn-warning btn-sm m-1" onclick="return confirm('Apakah Anda yakin ingin mengubah status penyewaan menjadi LUNAS?')">DP 50%</button>
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <td>Arip</td>
                                <td>Paket Pesta 2</td>
                                <td>20-22 Sept 2021</td>
                                <td>3 hari</td>
                                <td>Garden Palma</td>
                                <td>21,000,000</td>
                                <td class="text-center">
                                    <a class="btn btn-info btn-sm">Lunas</a>
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
