@extends('admin.app')

@section('title', 'Pembelian Tiket - Admin')

@section('user')
{{ $data['user']->name }}
@endsection

@section('content')

<main>
    <div class="container-fluid">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Pembelian Tiket</li>
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
                <h4><i class="fas fa-table mr-1"></i>Data Pembelian Tiket</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Event</th>
                                <th>Lokasi</th>
                                <th>Tanggal Event</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Event</th>
                                <th>Lokasi</th>
                                <th>Tanggal Event</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($data['events'] as $event)
                            <tr>
                                <td>{{ $event->name }}</td>
                                <td>{{ $event->location }}</td>
                                @isset ($event->end_date)
                                @if ($event->start_date == $event->end_date)
                                @php ($date = date("j M Y", strtotime($event->start_date)))
                                @else
                                @php ($date = date("j", strtotime($event->start_date)) . "-" . date("j M Y", strtotime($event->end_date)))
                                @endif
                                @endisset
                                @empty ($event->end_date)
                                @php ($date = date("j M Y", strtotime($event->start_date)))
                                @endempty
                                <td>{{ $date }}</td>
                                <td class="text-center">
                                    <a title="Daftar Pembeli" class="btn btn-info btn-sm m-1" href="{{ route('tickets.purchasers', $event->id) }}">Pembeli</a>
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
