@extends('admin.app')

@section('title', 'Edit Alat Event - Admin')

@section('user')
{{ $data['user']->name }}
@endsection

@section('content')

<main>
    <div class="container-fluid">
        <h1 class="mt-4">Edit Alat Event {{ $data['tool']->name }}</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Alat Event / Edit {{ $data['tool']->name }}</li>
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
                    Mengubah Alat Event
                    <div class="float-right">
                        <a class="btn btn-secondary btn-sm" href="{{ route('tools.index') }}">Back</a>
                    </div>
                </h4>
            </div>
            <div class="card-body">
                <form action="{{ route('tools.update', $data['tool']->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label class="mb-1" for="name">Nama Paket</label>
                        <input class="form-control" id="name" name="name" type="text" value="{{ $data['tool']->name }}" placeholder="Masukkan nama paket" required />
                    </div>
                    <div class="form-group">
                        <label class="mb-1" for="description">Deskripsi Paket</label>
                        <textarea class="form-control" id="description" name="description" type="text" rows="6" placeholder="Masukkan deskripsi peket (rincian alat)" required>{{ $data['tool']->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-8">
                                <div class="text-center">
                                    <img src="{{ asset('/storage/images/tools/'.$data['tool']->file_image) }}" alt="{{ $data['tool']->file_image }}" width="500" />
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label class="mb-1" for="price">Harga Paket per Hari</label>
                                    <div class="input-group">
                                        <div class="input-group-append">
                                            <span class="input-group-text">Rp</span>
                                        </div>
                                        <input class="form-control" id="price" name="price" type="number" min=1000 step=1000 value="{{ $data['tool']->price }}" placeholder="Masukkan harga paket" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="mb-1" for="file">Ganti Gambar Ilustrasi Paket</label>
                                    <input class="form-control-file" id="file" name="file" type="file" />
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
