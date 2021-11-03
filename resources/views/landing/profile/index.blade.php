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
                        <h2 class="page-title">Profile {{ $data['user']->name }}</h2>
                    </div>
                    <!--~~./ page-header-caption ~~-->
                    <div class="breadcrumb-area">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('landing') }}">Beranda</a>
                            </li>
                            <li class="breadcrumb-item active">Profile {{ $data['user']->name }}</li>
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
								Start Services Block
						~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<div id="service-block" class="services-block style-one">
    <div class="element-group">
        <div class="element one">
            <img src="{{ asset('albireo/images/element/circle-helf1.png') }}" alt="Element">
        </div>
    </div>
    <div class="container">
        <div class="row align-items-center md-wrap-reverse">
            <div class="col-lg-6 p-3">
                <div class="mock-up-thumb">
                    <img src="{{ asset('albireo/images/about/about1.png') }}" alt="About Mock" />
                </div>
                <!-- /.mock-up-block -->
            </div>
            <div class="col-lg-6 p-3">
                <div class="row service-items-area">
                    <div class="col-lg-12">
                        <div class="service-item">
                            <div class="service-icon d-flex align-items-center justify-content-center">
                                <img src="{{ asset('albireo/images/icon/services/1/3.png') }}" alt="Icon" />
                                <h3 class="title mb-0 ml-3">Profile</h3>
                            </div>
                            <!-- /.service-icon -->
                            <div class="service-info">
                                <form action="{{ route('profile.update', $data['user']->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group d-flex align-items-center">
                                        <label class="w-25" for="name">Nama</label>
                                        <input class="w-75 form-controller" value="{{ $data['user']->name }}" placeholder="{{ $data['user']->name }}" id="name" name="name" type="text" required>
                                    </div>
                                    <div class="form-group d-flex align-items-center">
                                        <label class="w-25" for="email">Email</label>
                                        <div class="w-75 position-relative">
                                            <input class="form-controller" style="color: grey;" value="{{ $data['user']->email }}" type="text" readonly>
                                            <div class="position-absolute" style="right: 15px; top: 8px; color: #f75e1e;"><i>permanent</i></div>
                                        </div>
                                    </div>
                                    <div class="form-group d-flex align-items-center">
                                        <label class="w-25" for="phone">No. Telp</label>
                                        <input class="w-75 form-controller" value="{{ $data['user']->phone }}" placeholder="{{ $data['user']->phone }}" id="phone" name="phone" type="number" required>
                                    </div>
                                    <div class="form-group d-flex align-items-center">
                                        <label class="w-25" for="address">Alamat</label>
                                        <input class="w-75 form-controller" value="{{ $data['user']->address }}" placeholder="{{ $data['user']->address }}" id="address" name="address" type="text" required>
                                    </div>
                                    <button type="submit" class="mt-4 btn btn-primary btn-block">Save</button>
                                </form>
                            </div>
                            <!-- /.service-info -->
                        </div>
                        <!-- /.service-item -->
                    </div>
                    <!-- /.col-lg-6 -->
                </div>
            </div>
        </div>
    </div>
    <!-- /.container -->
</div>
<!--~~./ end services block ~~-->

@endsection
