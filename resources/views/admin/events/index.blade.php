@extends('admin.app')

@section('title', 'Event - Admin')

@section('user')
{{ $data['user']->name }}
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
                <h4><i class="fas fa-table mr-1"></i>Data Event
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('events.add') }}">Tambah Event</a>
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
                                <th>Tiket</th>
                                <th>Lokasi</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Sponsor</th>
                                <th>Event</th>
                                <th>Deskripsi</th>
                                <th>Tiket</th>
                                <th>Lokasi</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($data['events'] as $event)
                            <tr>
                                <td>{{ $event->sponsor }}</td>
                                <td>
                                    {{ $event->name }}<br />
                                    <img class="mt-2" src="{{ asset('/storage/images/'.$event->file_image) }}" alt="{{ $event->file_image }}" width="120" />
                                </td>
                                <td>{{ $event->description }}</td>
                                <td width="150">
                                    <b>Presale 1</b>: {{ $event->presale_1 }} <br />
                                    <b>Presale 2</b>: {{ $event->presale_2 }} <br />
                                    <b>Onsale</b>: {{ $event->onsale }} <br />
                                </td>
                                <td>{{ $event->location }}</td>
                                @isset ($event->end_date)
                                @php ($date = date("d", strtotime($event->start_date)) . " - " . date("d M Y", strtotime($event->end_date)))
                                @endisset
                                @empty ($event->end_date)
                                @php ($date = date("d M Y", strtotime($event->start_date)))
                                @endempty
                                <td>{{ $date }}</td>
                                <td class="text-center">
                                    <form action="{{ route('events.destroy', $event->id) }}" method="POST">
                                        <a title="Edit" class="btn btn-warning btn-sm m-1" href="{{ route('events.edit', $event->id) }}">edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button title="Delete" type="submit" class="btn btn-danger btn-sm m-1" onclick="return confirm('Apakah Anda yakin ingin menghapus event ini?')">delete</button>
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
