@extends('landing.app')

@section('title', 'Brilla Futura - Rentals')

@section('content')

@include('landing.rentals.header')

<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        Start Page Title Area
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<div class="page-title-area bg-image bg-overlay" style="background-image: url('assets/images/header/1.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="page-header-content">
                    <div class="page-header-caption">
                        <h2 class="page-title">Sewa Alat</h2>
                    </div>
                    <!--~~./ page-header-caption ~~-->
                    <div class="breadcrumb-area">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('landing') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Sewa Alat</li>
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
                        <a href="#" data-filter="*" class="filter active">All</a>
                    </li>
                    <li>
                        <a href="#" data-filter=".Lighting" class="filter">Lighting</a>
                    </li>
                    <li>
                        <a href="#" data-filter=".Sound" class="filter">Sound</a>
                    </li>
                    <li>
                        <a href="#" data-filter=".Event" class="filter">Event</a>
                    </li>
                </ul>
            </div><!-- /.col-12 -->
        </div><!-- /.row -->

        <div class="row justify-content-center">
            <div class="col-lg-11">
                <div class="row portfolio-grid">
                    @foreach ($data['tools'] as $tool)
                    <div class="item col-lg-4 col-md-6 {{ $tool->type }}">
                        <article class="post post-grid service-item" style="padding: 0; margin: 0 0 16px 0; cursor: pointer;" href="{{ route('landing.rental.show', $tool->slug) }}">
                            <div class="post-thumb-area">
                                <figure class="post-thumb">
                                    <a href="{{ route('landing.rental.show', $tool->slug) }}">
                                        <img src="{{ asset('/storage/images/tools/'.$tool->file_image) }}" alt="{ $tool->file_image }}" style="object-fit: cover; height: 500px; width: 100%;" />
                                    </a>
                                </figure>
                                <!-- /.post-thumb -->
                            </div>
                            <!-- /.post-thumb-area -->

                            <div class="post-details" style="padding: 16px;">
                                <div class="entry-meta entry-meta-date">
                                    <div class="entry-date">{{ $tool->type }}</div>
                                </div>
                                <!--./ entry-meta-date -->
                                <h2 class="entry-title">
                                    <a href="{{ route('landing.rental.show', $tool->slug) }}">{{ $tool->name }}</a>
                                </h2>
                                <!-- /.entry-title -->
                                <div class="entry-meta">
                                    <div class="entry-meta-author">
                                        <div class="entry-author-name">
                                            <b>Rp {{ $tool->cost }}</b> / Day
                                        </div>
                                    </div>
                                    <!--./ entry-meta-author -->
                                </div>
                                <!-- /.entry-meta -->
                            </div>
                            <!-- /.post-details -->
                        </article>
                        <!-- /.post -->
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div><!-- /.container -->
</div>
<!--~~./ end portfolio block ~~-->

@endsection
