@extends('admin.app')

@section('title', 'Alat Event - Admin')

@section('user')
{{ "Reza"}}
@endsection

@section('content')

<main>
    <div class="container-fluid">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Alat Event</li>
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
                <h4>
                    <i class="fas fa-plus-square mr-1"></i>
                    Menambahkan Paket Alat Baru
                </h4>
            </div>
            <div class="card-body">
                <form action="#" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="mb-1" for="name">Nama Paket</label>
                        <input class="form-control" id="name" name="name" type="text" placeholder="Masukkan nama paket" required />
                    </div>
                    <div class="form-group">
                        <label class="mb-1" for="description">Deskripsi Paket</label>
                        <textarea class="form-control" id="description" name="description" type="text" placeholder="Masukkan deskripsi peket (rincian alat)" rows=3 required></textarea>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label class="mb-1" for="price">Harga Paket per Hari</label>
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text">Rp</span>
                                    </div>
                                    <input class="form-control" id="price" name="price" type="number" min=1000 step=1000 placeholder="Masukkan harga paket" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="mb-1" for="file">Upload Gambar Ilustrasi Paket</label>
                                    <input class="form-control-file" id="file" name="file" type="file" required />
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <h4><i class="fas fa-table mr-1"></i>Data Event</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th>Harga per Hari</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th>Harga per Hari</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <tr>
                                <td>
                                    Paket Pesta 1 <br />
                                    <img class="mt-2" src="{{ asset('logo.png') }}" alt="logo" width="120" />
                                </td>
                                <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</td>
                                <td width="180" style="text-align: right">7,000,000</td>
                                <td class="text-center">
                                    <form action="#" method="POST">
                                        <a title="Edit" class="btn btn-warning btn-sm m-1" href="#">edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button title="Delete" type="submit" class="btn btn-danger btn-sm m-1" onclick="return confirm('Apakah Anda yakin ingin menghapus paket ini?')">delete</button>
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Paket Pesta 2 <br />
                                    <img class="mt-2" src="{{ asset('logo.png') }}" alt="logo" width="120" />
                                </td>
                                <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</td>
                                <td width="180" style="text-align: right">12,000,000</td>
                                <td class="text-center">
                                    <form action="#" method="POST">
                                        <a title="Edit" class="btn btn-warning btn-sm m-1" href="#">edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button title="Delete" type="submit" class="btn btn-danger btn-sm m-1" onclick="return confirm('Apakah Anda yakin ingin menghapus event ini?')">delete</button>
                                    </form>
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
