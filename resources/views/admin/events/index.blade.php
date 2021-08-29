@extends('admin.app')

@section('title', 'Event - Admin')

@section('user')
{{ "Reza"}}
@endsection

@section('content')

<main>
    <div class="container-fluid">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Event</li>
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
                    Menambahkan Event Baru
                </h4>
            </div>
            <div class="card-body">
                <form action="#" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="mb-1" for="name">Nama Event</label>
                        <input class="form-control" id="name" name="name" type="text" placeholder="Masukkan nama event" required />
                    </div>
                    <div class="form-group">
                        <label class="mb-1" for="description">Deskripsi Event</label>
                        <textarea class="form-control" id="description" name="description" type="text" placeholder="Masukkan deskripsi event" required></textarea>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label>Kategori</label>
                            </div>
                            <div class="col-md-6">
                                <label>Harga Tiket</label>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input class="form-control" type="text" value="Tiket Platinum" readonly />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text">Rp</span>
                                    </div>
                                    <input class="form-control" id="platinum-price" name="platinum-price" type="number" placeholder="Masukkan harga tiket Platinum" />
                                </div>
                            </div>
                        </div>
                        <div class="form-row mt-1">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input class="form-control" type="text" value="Tiket Gold" readonly />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text">Rp</span>
                                    </div>
                                    <input class="form-control" id="gold-price" name="gold-price" type="number" placeholder="Masukkan harga tiket Gold" />
                                </div>
                            </div>
                        </div>
                        <div class="form-row mt-1">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input class="form-control" type="text" value="Tiket Silver" readonly />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text">Rp</span>
                                    </div>
                                    <input class="form-control" id="silver-price" name="silver-price" type="number" placeholder="Masukkan harga tiket Silver" />
                                </div>
                            </div>
                        </div>
                        <div class="form-row mt-1">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input class="form-control" type="text" value="Tiket Reguler" readonly />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text">Rp</span>
                                    </div>
                                    <input class="form-control" id="reguler-price" name="reguler-price" type="number" placeholder="Masukkan harga tiket Reguler" />
                                </div>
                            </div>
                        </div>
                        <label class="mt-1">Nb: Jika kategori tiket tidak tersedia, harga tiket tidak perlu diisi</label>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label class="mb-1" for="location">Lokasi Event</label>
                                <input class="form-control" id="location" name="location" type="text" placeholder="Masukkan lokasi event" required />
                            </div>
                            <div class="col-md-6">
                                <label class="mb-1" for="start-date">Tanggal Event</label>
                                <input class="form-control" id="start-date" name="start-date" type="date" required />
                            </div>
                            <!-- <div class="col-md-6">
                                <label class="mb-1" for="finish-date">Tanggal Event Selesai</label>
                                <input class="form-control" id="finish-date" name="finish-date" type="date" required />
                            </div> -->
                            <!-- <label class="mb-1">Nb: Jika Event hanya berlangsung 1 hari, masukkan tanggal yang sama</label> -->
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="mb-1" for="file">Upload Gambar Event</label>
                        <input class="form-control-file" id="file" name="file" type="file" required />
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
                                <th>Harga Tiket</th>
                                <th>Lokasi</th>
                                <th>Tanggal Event</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th>Harga Tiket</th>
                                <th>Lokasi</th>
                                <th>Tanggal Event</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <tr>
                                <td>
                                    Konser 123 <br />
                                    <img class="mt-2" src="{{ asset('logo.png') }}" alt="logo" width="120" />
                                </td>
                                <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</td>
                                <td width="180">
                                    <b>Platinum</b>: 120.000 <br />
                                    <b>Gold</b>: 100.000 <br />
                                    <b>Silver</b>: 80.000 <br />
                                    <b>Reguler</b>: 70.000
                                </td>
                                <td>Garden Palace</td>
                                <td>30 Agust 2021</td>
                                <td class="text-center">
                                    <form action="#" method="POST">
                                        <a title="Edit" class="btn btn-warning btn-sm m-1" href="#">edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button title="Delete" type="submit" class="btn btn-danger btn-sm m-1" onclick="return confirm('Apakah Anda yakin ingin menghapus event ini?')">delete</button>
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Konser 456 <br />
                                    <img class="mt-2" src="{{ asset('logo.png') }}" alt="logo" width="120" />
                                </td>
                                <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</td>
                                <td width="180">
                                    <b>Platinum</b>: 150.000 <br />
                                    <b>Gold</b>: 130.000 <br />
                                    <b>Silver</b>: 100.000 <br />
                                    <b>Reguler</b>:
                                </td>
                                <td>Samantha Krida</td>
                                <td>31 Agust 2021</td>
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
