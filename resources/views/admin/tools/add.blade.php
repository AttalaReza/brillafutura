@extends('admin.app')

@section('title', 'Tambah Alat Event - Admin')

@section('user')
{{ $data['user']->name }}
@endsection

@section('content')

<main>
    <div class="container-fluid">
        <h1 class="mt-4">Tambah Alat Event</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Alat Event / Menambahkan Alat Event Baru</li>
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
                    Menambahkan Alat Event Baru
                    <div class="float-right">
                        <a class="btn btn-secondary btn-sm" href="{{ route('tools.index') }}">Back</a>
                    </div>
                </h4>
            </div>
            <div class="card-body">
                <form action="{{ route('tools.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="mb-1" for="name">Nama Paket</label>
                        <input class="form-control" id="name" name="name" type="text" placeholder="Masukkan nama paket" required />
                    </div>
                    <div class="form-group">
                        <label class="mb-1" for="description">Deskripsi Paket</label>
                        <textarea class="form-control" id="description" name="description" type="text" rows="6" placeholder="Masukkan deskripsi peket (rincian alat)" required></textarea>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-6">
                                <label class="mb-1" for="price">Harga Paket per Hari</label>
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text">Rp</span>
                                    </div>
                                    <input class="form-control" id="price" name="price" type="number" min=1000 step=1000 placeholder="Masukkan harga paket" required />
                                </div>
                            </div>
                            <div class="col-6">
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
    </div>
</main>

@endsection
