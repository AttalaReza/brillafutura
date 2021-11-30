@extends('landing.app')

@section('title')
Profile {{ $data['user']->name }}
@endsection

@section('content')

@include('landing.profile.header')

<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
Start Page Title Area
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<div class="page-title-area bg-image bg-overlay" style="background-image: url('assets/images/header/1.jpg')">
    <div class="mx-5">
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
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="page-header-content">
                    <div class="page-header-caption">
                        <h2 class="page-title">Riwayat Pembelian Tiket<br />dan Penyewaan Alat</h2>
                    </div>
                    <!--~~./ page-header-caption ~~-->
                    <div class="breadcrumb-area">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('landing') }}">Beranda</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('profile.index') }}">Profile</a>
                            </li>
                            <li class="breadcrumb-item active">Daftar Riwayat</li>
                        </ol>
                    </div>
                    <!--~~./ breadcrumb-area ~~-->
                </div>
                <!--~~./ page-header-content ~~-->
            </div>
        </div>
    </div>
    <!--~~./ end container ~~-->
</div>
<!--~~./ end page title area ~~-->


<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Portfolio Block
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<div class="portfolio-block ptb-130">
    <div class="container">

        <div class="row">
            <div class="col-12 text-center">
                <ul class="portfolio-filter">
                    <li>
                        <a href="#" data-filter="*" class="filter active">Semua</a>
                    </li>
                    <li>
                        <a href="#" data-filter=".rental" class="filter">Penyewaan Alat</a>
                    </li>
                    <li>
                        <a href="#" data-filter=".ticket" class="filter">Pembelian Tiket</a>
                    </li>
                </ul>
            </div><!-- /.col-12 -->
        </div><!-- /.row -->

        <div class="row d-flex flex-wrap justify-content-start">
            <div class="col-lg-12">
                <div class="row portfolio-grid">
                    @if ($data['purchases'] != [] && $data['rentals'] != [])
                    @foreach ($data['rentals'] as $payment)
                    <div class="item col-lg-4 col-md-6 rental">
                        <article class="post post-grid service-item" style="padding: 0; margin: 0 0 16px 0; cursor: pointer;" href="{{ route('landing.rental.show', $payment->rental->tool->slug) }}">
                            <div class="post-thumb-area">
                                <figure class="post-thumb">
                                    <a href="{{ route('landing.rental.show', $payment->rental->tool->slug) }}">
                                        <img src="{{ asset('/uploads/'.$payment->rental->tool->file_image) }}" alt="{{ $payment->rental->tool->file_image }}" />
                                    </a>
                                </figure>
                                <!-- /.post-thumb -->
                            </div>
                            <!-- /.post-thumb-area -->

                            <div class="post-details" style="padding: 16px;">
                                <div class="entry-meta entry-meta-date w-100">
                                    <div class="entry-date w-100 d-flex align-items-center justify-content-between">
                                        Tanggal Sewa: {{ $payment->rental->day }}, {{ $payment->rental->date }}
                                        @if ($payment->status !== "success" && $payment->status !== "settlement")
                                        <form action="{{ route('profile.history.delete', $payment->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button title="Hapus Pesanan" type="submit" class=" btn btn-danger btn-sm p-1" style="color: #FFF; font-size: 1.25em; line-height: 0.675" onclick="return confirm('Apakah Anda yakin ingin menghapus pesanan ini?')">x</button>
                                        </form>
                                        @endif
                                    </div>
                                </div>
                                <!--./ entry-meta-date -->
                                <h2 class="entry-title">
                                    <a href="{{ route('landing.rental.show', $payment->rental->tool->slug) }}">{{ $payment->rental->tool->name }}</a>
                                </h2>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div style="color: #158682;">
                                        {{ $payment->rental->location }}<br />
                                        Rp {{ $payment->rental->price }} / Hari<br />
                                        Total: Rp {{ $payment->rental->total}}
                                    </div>
                                    <div style="color: #158682; text-transform: capitalize;">
                                        @if ($payment->status === "success" || $payment->status === "settlement")
                                        <h5 class="rounded px-3 py-2 m-0" style="color: #FFF; background-color: #158682;">{{ $payment->rental->status}}: {{ $payment->status }}</h5>
                                        @else
                                        <h5 class="rounded px-3 py-2 m-0" style="color: #FFF; background-color: #f75e1e;">{{ $payment->status }}</h5>
                                        @endif
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end my-2" style="color: #000000;">Tanggal Pesan: {{ $payment->created_time }} {{ $payment->created_day }}, {{ $payment->created }}</div>
                                <!-- /.entry-title -->
                                @if ($payment->status === "success" || $payment->status === "settlement")
                                <form action="{{ route('invoice.export', ['id' => $payment->id, 'key' => $payment->key ]) }}" target="_blank" method="GET" enctype="multipart/form-data">
                                    <button title="{{ $payment->rental->status}}" style="text-transform: capitalize;" class="btn btn-primary btn-sm btn-block py-1" name="buy" id="buy" type="submit">
                                        Lihat Invoice Pembayaran
                                    </button>
                                </form>
                                @else
                                <form action="{{ redirect($payment->rental->redirect_url) }}" method="GET" enctype="multipart/form-data">
                                    <button class="btn btn-primary btn-sm btn-block py-1" name="buy" id="buy" type="submit">
                                        Sewa Ulang
                                    </button>
                                </form>
                                @endif
                                <!-- /.entry-meta -->
                            </div>
                            <!-- /.post-details -->
                        </article>
                        <!-- /.post -->
                    </div>
                    @endforeach
                    @foreach ($data['purchases'] as $payment)
                    <div class="item col-lg-4 col-md-6 ticket">
                        <article class="post post-grid service-item" style="padding: 0; margin: 0 0 16px 0; cursor: pointer;" href="{{ route('landing.event.show', $payment->purchase->event->slug) }}">
                            <div class="post-thumb-area">
                                <figure class="post-thumb">
                                    <a href="{{ route('landing.event.show', $payment->purchase->event->slug) }}">
                                        <img src="{{ asset('/storage/images/events/'.$payment->purchase->event->file_image) }}" alt="{{ $payment->purchase->event->file_image }}" />
                                    </a>
                                </figure>
                                <!-- /.post-thumb -->
                            </div>
                            <!-- /.post-thumb-area -->

                            <div class="post-details" style="padding: 16px;">
                                <div class="entry-meta entry-meta-date w-100">
                                    <div class="entry-date w-100 d-flex align-items-center justify-content-between">
                                        {{ $payment->purchase->event->day }}, {{ $payment->purchase->event->date }}
                                        @if ($payment->status !== "success" && $payment->status !== "settlement")
                                        <form action="{{ route('profile.history.delete', $payment->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button title="Hapus Pesanan" type="submit" class=" btn btn-danger btn-sm p-1" style="color: #FFF; font-size: 1.25em; line-height: 0.675" onclick="return confirm('Apakah Anda yakin ingin menghapus pesanan ini?')">x</button>
                                        </form>
                                        @endif
                                    </div>
                                </div>
                                <!--./ entry-meta-date -->
                                <h2 class="entry-title">
                                    <a href="{{ route('landing.event.show', $payment->purchase->event->slug) }}">{{ $payment->purchase->event->name }}</a>
                                </h2>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div style="color: #158682;">
                                        {{ $payment->purchase->amount }} Tiket {{ $payment->purchase->ticket }} <br />
                                        @ Rp {{ $payment->purchase->price }}<br />
                                        Total: Rp {{ $payment->purchase->total}}
                                    </div>
                                    <div style="color: #158682; text-transform: capitalize;">
                                        @if ($payment->status === "success" || $payment->status === "settlement")
                                        <h5 class="rounded px-3 py-2 m-0" style="color: #FFF; background-color: #158682;">{{ $payment->status }}</h5>
                                        @else
                                        <h5 class="rounded px-3 py-2 m-0" style="color: #FFF; background-color: #f75e1e;">{{ $payment->status }}</h5>
                                        @endif
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end my-2" style="color: #000000;">Tanggal Pesan: {{ $payment->created_time }} {{ $payment->created_day }}, {{ $payment->created }}</div>
                                <!-- /.entry-title -->
                                @if ($payment->status === "success" || $payment->status === "settlement")
                                <form action="{{ route('invoice.export', ['id' => $payment->id, 'key' => $payment->key ]) }}" target="_blank" method="GET" enctype="multipart/form-data">
                                    <button title="{{ $payment->purchase->code}}" class="btn btn-primary btn-sm btn-block py-1" name="buy" id="buy" type="submit">
                                        Lihat Invoice Pembayaran
                                    </button>
                                </form>
                                @else
                                <a href="{{ ($payment->purchase->redirect_url) }}" class="btn btn-primary btn-sm btn-block py-1" name="buy" id="buy" type="submit">
                                    Beli Ulang
                                </a>
                                @endif
                                <!-- /.entry-meta -->
                            </div>
                            <!-- /.post-details -->
                        </article>
                        <!-- /.post -->
                    </div>
                    @endforeach

                    @else
                    <h4 class="w-100 d-flex justify-content-center" style="color: #BDBDBD">Anda belum memiliki riwayat pembelian tiket atau penyewaan alat</h4>
                    @endif
                </div>
            </div>
        </div>
    </div><!-- /.container -->
</div>
<!--~~./ end portfolio block ~~-->

@include('landing.footer')

@endsection
