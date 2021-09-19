@extends('admin.app')

@section('title', 'Tambah Event - Admin')

@section('user')
{{ $data['user']->name }}
@endsection

@section('content')

<main>
    <div class="container-fluid">
        <h1 class="mt-4">Tambah Event</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Event / Menambahkan Event Baru</li>
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
                    <div class="float-right">
                        <a class="btn btn-secondary btn-sm" href="{{ route('events.index') }}">Back</a>
                    </div>
                </h4>
            </div>
            <div class="card-body">
                <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama Event</label>
                        <input class="form-control" id="name" name="name" type="text" placeholder="Masukkan nama event" required />
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi Event</label>
                        <textarea class="form-control" id="description" name="description" type="text" rows=3 placeholder="Masukkan deskripsi event" required></textarea>
                    </div>
                    <label>Nb: Deskripsi mencakup informasi umum, aturan, dan waktu pelaksanaan event</label>
                    <hr />
                    <label><b>Tiket Event</b></label>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-4">
                                <label for="presale_1">Tiket Presale 1</label>
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text">Rp</span>
                                    </div>
                                    <input class="form-control" id="presale_1" name="presale_1" type="number" min=0 step=1000 placeholder="Masukkan harga tiket" />
                                </div>
                            </div>
                            <div class="col-2">
                                <label for="presale_1_quota">Jumlah Tiket</label>
                                <input class="form-control" id="presale_1_quota" name="presale_1_quota" type="number" min=0 />
                            </div>
                            <div class="col-3">
                                <label for="presale_1_start">Penjualan Dimulai</label>
                                <input class="form-control" id="presale_1_start" name="presale_1_start" type="date" />
                            </div>
                            <div class="col-3">
                                <label for="presale_1_end">Penjualan Berakhir</label>
                                <input class="form-control" id="presale_1_end" name="presale_1_end" type="date" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-4">
                                <label for="presale_2">Tiket Presale 2</label>
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text">Rp</span>
                                    </div>
                                    <input class="form-control" id="presale_2" name="presale_2" type="number" min=0 step=1000 placeholder="Masukkan harga tiket" />
                                </div>
                            </div>
                            <div class="col-2">
                                <label for="presale_2_quota">Jumlah Tiket</label>
                                <input class="form-control" id="presale_2_quota" name="presale_2_quota" type="number" min=0 />
                            </div>
                            <div class="col-3">
                                <label for="presale_2_start">Penjualan Dimulai</label>
                                <input class="form-control" id="presale_2_start" name="presale_2_start" type="date" />
                            </div>
                            <div class="col-3">
                                <label for="presale_2_end">Penjualan Berakhir</label>
                                <input class="form-control" id="presale_2_end" name="presale_2_end" type="date" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-4">
                                <label for="onsale">Tiket Onsale</label>
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text">Rp</span>
                                    </div>
                                    <input class="form-control" id="onsale" name="onsale" type="number" min=0 step=1000 placeholder="Masukkan harga tiket" />
                                </div>
                            </div>
                            <div class="col-2">
                                <label for="onsale_quota">Jumlah Tiket</label>
                                <input class="form-control" id="onsale_quota" name="onsale_quota" type="number" min=0   />
                            </div>
                            <div class="col-3">
                                <label for="onsale">Penjualan Dimulai</label>
                                <input class="form-control" id="onsale_start" name="onsale_start" type="date" />
                            </div>
                            <div class="col-3">
                                <label for="onsale">Penjualan Berakhir</label>
                                <input class="form-control" id="onsale_end" name="onsale_end" type="date" />
                            </div>
                        </div>
                    </div>
                    <label>Nb: Kosongkan harga dan tanggal jika kategori tiket tidak tersedia</label>
                    <hr />
                    <label><b>Informasi Event</b></label>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-6">
                                <label for="location">Lokasi</label>
                                <input class="form-control" id="location" name="location" type="text" placeholder="Masukkan lokasi event" required />
                            </div>
                            <div class="col-3">
                                <label for="start-date">Tanggal Dimulai</label>
                                <input class="form-control" id="start_date" name="start_date" type="date" required />
                            </div>
                            <div class="col-3">
                                <label for="end-date">Tanggal Berakhir</label>
                                <input class="form-control" id="end_date" name="end_date" type="date" />
                            </div>
                        </div>
                    </div>
                    <label>Nb: Kosongkan Tanggal Berakhir jika Event hanya berlangsung 1 hari</label>
                    <hr />
                    <div class="form-group">
                        <label for="file">Upload Gambar / Ilustrasi Event</label>
                        <input class="form-control-file" id="file" name="file" type="file" required />
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

@endsection
