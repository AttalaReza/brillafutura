@extends('admin.app')

@section('title', 'Alat Event - Admin')

@section('user')
{{ $data['user']->name }}
@endsection

@section('content')

<main>
    <div class="container-fluid">
        <h1 class="mt-4">Alat Event</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Data Semua Alat Event</li>
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
                <h4><i class="fas fa-table mr-1"></i>Data Alat Event
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('tools.add') }}">Tambah Alat Event</a>
                    </div>
                </h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th>Harga</th>
                                <th>Type</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th>Harga</th>
                                <th>Type</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($data['tools'] as $tool)
                            <tr>
                                <td>
                                    {{ $tool->name }} <br />
                                    <img class="mt-2" src="{{ asset('/storage/images/tools/'.$tool->file_image) }}" alt="{{ $tool->file_image }}" width="120" />
                                </td>
                                <td>{{ $tool->description }}</td>
                                <td width=160>Rp {{ $tool->cost }} </td>
                                <td width=160>{{ $tool-> type }} </td>
                                <td class="text-center">
                                    <form action="{{ route('tools.destroy', $tool->id) }}" method="POST">
                                        <a title="Edit" class="btn btn-warning btn-sm m-1" href="{{ route('tools.edit', $tool->id) }}">edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button title="Delete" type="submit" class="btn btn-danger btn-sm m-1" onclick="return confirm('Apakah Anda yakin ingin menghapus paket {{ $tool->name }} ?')">delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
