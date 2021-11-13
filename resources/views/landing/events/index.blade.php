@extends('landing.app')

@section('title', 'Brilla Futura - Events')

@section('content')

@include('landing.events.header')

<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        Start Page Title Area
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<div class="page-title-area bg-image bg-overlay" style="background-image: url('assets/images/header/1.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="page-header-content">
                    <div class="page-header-caption">
                        <h2 class="page-title">Event</h2>
                    </div>
                    <!--~~./ page-header-caption ~~-->
                    <div class="breadcrumb-area">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('landing') }}">Beranda</a>
                            </li>
                            <li class="breadcrumb-item active">Event</li>
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
	Start Latest News Block
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<div class="blog-page-block ptb-130">
    <div class="container">
        <!-- Content Row -->
        <div class="row">
            <div class="col-12">
                <!-- Blog Items -->
                <div class="blog-latest-items">
                    <div class="row">
                        @foreach ($data['events'] as $event)
                        <div class="col-lg-4 col-md-6">
                            <article class="post post-grid service-item" style="padding: 0; margin: 0 0 16px 0; cursor: pointer;" href="{{ route('landing.event.show', $event->slug) }}">
                                    <div class="post-thumb-area">
                                        <figure class="post-thumb">
                                            <a href="{{ route('landing.event.show', $event->slug) }}">
                                                <img src="{{ asset('/storage/images/events/'.$event->file_image) }}" alt="{{ $event->file_image }}" style="object-fit: cover; height: 500px; width: 100%;"/>
                                            </a>
                                        </figure>
                                        <!-- /.post-thumb -->
                                    </div>
                                    <!-- /.post-thumb-area -->

                                    <div class="post-details" style="padding: 16px;">
                                        <div class="entry-meta entry-meta-date">
                                            <div class="entry-date">{{ $event->day }}, {{ $event->date }}</div>
                                        </div>
                                        <!--./ entry-meta-date -->
                                        <h2 class="entry-title">
                                            <a href="{{ route('landing.event.show', $event->slug) }}">{{ $event->name }}</a>
                                        </h2>
                                        <!-- /.entry-title -->
                                        <div class="entry-meta">
                                            <div class="entry-meta-author">
                                                <div class="entry-author-name">
                                                    Lokasi: <b>{{ $event->location }}</b>
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
                        <!-- /.col-lg-4 -->
                        @endforeach
                    </div>
                    <!-- /.row -->
                </div>
                <!--  /.blog-latest-items -->

                <!--~~~~~ Start View Btn ~~~~~-->
                <!-- <div class="view-btn-area text-center pd-t-50">
                    <a class="btn btn-primary" href="#">View All</a>
                </div> -->
                <!--~./ view-btn-area ~-->
            </div>
            <!-- /.col-lg-8 -->
        </div>
        <!-- /.row -->
    </div>
    <!--  /.container -->
</div>
<!--~~./ end blog page ~~-->

@include('landing.footer')

@endsection
