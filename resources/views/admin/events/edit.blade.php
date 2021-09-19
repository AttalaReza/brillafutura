@extends('admin.app')

@section('title', 'Edit Event - Admin')

@section('user')
{{ $data['user']->name }}
@endsection

@section('content')

<main>
    <div class="container-fluid">
        <h1 class="mt-4">Edit Event {{ $data['event']->name }}</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Event / Edit {{ $data['event']->name }}</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <h4>
                    <i class="fas fa-edit mr-1"></i>
                    Mengubah Event
                    <div class="float-right">
                        <a class="btn btn-secondary btn-sm" href="{{ route('events.index') }}">Back</a>
                    </div>
                </h4>
            </div>
            <div class="card-body">
                <form action="{{ route('events.update', $data['event']->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Nama Event</label>
                        <input class="form-control" id="name" name="name" type="text" value="{{ $data['event']->name }}" placeholder="Masukkan nama event" required />
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi Event</label>
                        <textarea class="form-control" id="description" name="description" type="text" rows=3 placeholder="Masukkan deskripsi event" required>{{ $data['event']->description }}</textarea>
                    </div>
                    <label>Nb: Deskripsi mencakup informasi umum, aturan, dan waktu pelaksanaan event</label>
                    <hr />
                    <label><b>Tiket Event</b></label>
                    <!-- presale 1 -->
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-4">
                                <label for="presale_1">Tiket Presale 1</label>
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text">Rp</span>
                                    </div>
                                    <input value="{{ $data['event']->presale_1 }}" class="form-control" id="presale_1" name="presale_1" type="number" min=0 step=1000 placeholder="Masukkan harga tiket" />
                                </div>
                            </div>
                            <div class="col-2">
                                <label for="presale_1_quota">Jumlah Tiket</label>
                                <input value="{{ $data['event']->presale_1_quota }}" class="form-control" id="presale_1_quota" name="presale_1_quota" type="number" min=0 />
                            </div>
                            <div class="col-3">
                                <label for="presale_1_start">Penjualan Dimulai</label>
                                <input value="{{ $data['event']->presale_1_start }}" class="form-control" id="presale_1_start" name="presale_1_start" type="date" />
                            </div>
                            <div class="col-3">
                                <label for="presale_1_end">Penjualan Berakhir</label>
                                <input value="{{ $data['event']->presale_1_end }}" class="form-control" id="presale_1_end" name="presale_1_end" type="date" />
                            </div>
                        </div>
                    </div>
                    <!-- presale 2 -->
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-4">
                                <label for="presale_2">Tiket Presale 2</label>
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text">Rp</span>
                                    </div>
                                    <input value="{{ $data['event']->presale_2 }}" class="form-control" id="presale_2" name="presale_2" type="number" min=0 step=1000 placeholder="Masukkan harga tiket" />
                                </div>
                            </div>
                            <div class="col-2">
                                <label for="presale_2_quota">Jumlah Tiket</label>
                                <input value="{{ $data['event']->presale_2_quota }}" class="form-control" id="presale_2_quota" name="presale_2_quota" type="number" min=0 />
                            </div>
                            <div class="col-3">
                                <label for="presale_2_start">Penjualan Dimulai</label>
                                <input value="{{ $data['event']->presale_2_start }}" class="form-control" id="presale_2_start" name="presale_2_start" type="date" />
                            </div>
                            <div class="col-3">
                                <label for="presale_2_end">Penjualan Berakhir</label>
                                <input value="{{ $data['event']->presale_2_end }}" class="form-control" id="presale_2_end" name="presale_2_end" type="date" />
                            </div>
                        </div>
                    </div>
                    <!-- onsale -->
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-4">
                                <label for="onsale">Tiket Onsale</label>
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text">Rp</span>
                                    </div>
                                    <input value="{{ $data['event']->onsale }}" class="form-control" id="onsale" name="onsale" type="number" min=0 step=1000 placeholder="Masukkan harga tiket" />
                                </div>
                            </div>
                            <div class="col-2">
                                <label for="onsale_quota">Jumlah Tiket</label>
                                <input value="{{ $data['event']->onsale_quota }}" class="form-control" id="onsale_quota" name="onsale_quota" type="number" min=0 />
                            </div>
                            <div class="col-3">
                                <label for="onsale_start">Penjualan Dimulai</label>
                                <input value="{{ $data['event']->onsale_start }}" class="form-control" id="onsale_start" name="onsale_start" type="date" />
                            </div>
                            <div class="col-3">
                                <label for="onsale_end">Penjualan Berakhir</label>
                                <input value="{{ $data['event']->onsale_end }}" class="form-control" id="onsale_end" name="onsale_end" type="date" />
                            </div>
                        </div>
                    </div>
                    <label>Nb: Kosongkan harga dan tanggal jika kategori tiket tidak tersedia</label>
                    <hr />
                    <label><b>Informasi Event</b></label>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-6">
                                <label for="location">Lokasi Event</label>
                                <input class="form-control" id="location" name="location" type="text" value="{{ $data['event']->location }}" placeholder="Masukkan lokasi event" required />
                            </div>
                            <div class="col-3">
                                <label for="start-date">Tanggal Dimulai</label>
                                <input value="{{ $data['event']->start_date }}" class="form-control" id="start_date" name="start_date" type="date" />
                            </div>
                            <div class="col-3">
                                <label for="end-date">Tanggal Berakhir</label>
                                <input value="{{ $data['event']->end_date }}" class="form-control" id="end_date" name="end_date" type="date" />
                            </div>
                        </div>
                    </div>
                    <label>Nb: Kosongkan Tanggal Berakhir jika Event hanya berlangsung 1 hari / gunakan tanggal yang sama</label>
                    <hr />
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-8">
                                <div class="text-center">
                                    <img src="{{ asset('/storage/images/events/'.$data['event']->file_image) }}" alt="{{ $data['event']->file_image }}" width="500" />
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="file">Ganti Gambar Event</label>
                                <input class="form-control-file" id="file" name="file" type="file" />
                            </div>
                        </div>
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
