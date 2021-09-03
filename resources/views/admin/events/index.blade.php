@extends('admin.app')

@section('title', 'Event - Admin')

@section('user')
{{"Reza"}}
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
                        <label class="mb-1" for="sponsor">Sponsor Event</label>
                        <input class="form-control" id="sponsor" name="sponsor" type="text" placeholder="Masukkan nama sponsor event" required />
                    </div>
                    <div class="form-group">
                        <label class="mb-1" for="description">Deskripsi Event</label>
                        <textarea class="form-control" id="description" name="description" type="text" rows=3 placeholder="Masukkan deskripsi event" required></textarea>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-2">
                                <label>Kategori Tiket</label>
                            </div>
                            <div class="col-md-4">
                                <label>Harga Tiket</label>
                            </div>
                            <div class="col-md-3">
                                <label>Tanggal Penjualan Dimulai</label>
                            </div>
                            <div class="col-md-3">
                                <label>Tanggal Penjualan Berakhir</label>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <div class="input-group">
                                    <input class="form-control" type="text" value="Tiket Presale 1" readonly />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text">Rp</span>
                                    </div>
                                    <input class="form-control" id="presale-l" name="presale-l" type="number" min=1000 step=1000 placeholder="Masukkan harga tiket Presale 1" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <input class="form-control" id="presale-1-start" name="presale-l-start" type="date" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <input class="form-control" id="presale-1-end" name="presale-l-end" type="date" />
                                </div>
                            </div>
                        </div>
                        <div class="form-row mt-1">
                            <div class="col-md-2">
                                <div class="input-group">
                                    <input class="form-control" type="text" value="Tiket Presale 2" readonly />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text">Rp</span>
                                    </div>
                                    <input class="form-control" id="presale-2" name="presale-2" type="number" min=1000 step=1000 placeholder="Masukkan harga tiket Presale 2" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <input class="form-control" id="presale-2-start" name="presale-2-start" type="date" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <input class="form-control" id="presale-2-end" name="presale-2-end" type="date" />
                                </div>
                            </div>
                        </div>
                        <div class="form-row mt-1">
                            <div class="col-md-2">
                                <div class="input-group">
                                    <input class="form-control" type="text" value="Tiket Onsale" readonly />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text">Rp</span>
                                    </div>
                                    <input class="form-control" id="onsale" name="onsale" type="number" min=1000 step=1000 placeholder="Masukkan harga tiket Onsale" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <input class="form-control" id="onsale-start" name="onsale-start" type="date" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <input class="form-control" id="onsale-end" name="onsale-end" type="date" />
                                </div>
                            </div>
                        </div>

                        <label class="mt-1">Nb: Jika kategori tiket tidak tersedia, harga tiket tidak perlu diisi</label>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-4">
                                <label class="mb-1" for="location">Lokasi Event</label>
                                <input class="form-control" id="location" name="location" type="text" placeholder="Masukkan lokasi event" required />
                            </div>
                            <div class="col-md-4">
                                <label class="mb-1" for="start-date">Tanggal Event Dimulai</label>
                                <input class="form-control" id="start-date" name="start-date" type="date" required />
                            </div>
                            <div class="col-md-4">
                                <label class="mb-1" for="end-date">Tanggal Event Berakhir</label>
                                <input class="form-control" id="end-date" name="end-date" type="date" required />
                            </div>
                            <label class="mb-1">Nb: Jika Event hanya berlangsung 1 hari, masukkan tanggal yang sama</label>
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
                <h4><i class="fas fa-table mr-1"></i>Data Event
                    <div class="float-right">
                        <a class="btn btn-primary" href="/events/add">Tambah Event</a>
                    </div>
                </h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Sponsor</th>
                                <th>Event</th>
                                <th>Deskripsi</th>
                                <th>Harga Tiket</th>
                                <th>Lokasi</th>
                                <th>Tanggal Event</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Sponsor</th>
                                <th>Event</th>
                                <th>Deskripsi</th>
                                <th>Harga Tiket</th>
                                <th>Lokasi</th>
                                <th>Tanggal Event</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <tr>
                                <td>Angkasa</td>
                                <td>
                                    Konser 123 <br />
                                    <img class="mt-2" src="{{ asset('logo.png') }}" alt="logo" width="120" />
                                </td>
                                <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</td>
                                <td width="180">
                                    <b>Presale 1</b>: 80.000 <br />
                                    <b>Presale 2</b>: 100.000 <br />
                                    <b>Onsale</b>: 120.000 <br />
                                </td>
                                <td>Garden Palace</td>
                                <td>1 - 2 Sept 2021</td>
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
                                <td>BEM FILKOM UB</td>
                                <td>
                                    Konser 456 <br />
                                    <img class="mt-2" src="{{ asset('logo.png') }}" alt="logo" width="120" />
                                </td>
                                <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</td>
                                <td width="180">
                                    <b>Presale 1</b>: 100.000 <br />
                                    <b>Presale 2</b>: 130.000 <br />
                                    <b>Onsale</b>: 150.000 <br />
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
