@extends('landing.app')

@section('title')
{{ $data['tool']->name }}
@endsection

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
                        <h2 class="page-title">{{ $data['tool']->name }}</h2>
                    </div>
                    <!--~~./ page-header-caption ~~-->
                    <div class="breadcrumb-area">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('landing') }}">Beranda</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('landing.rentals') }}">Sewa Alat</a>
                            </li>
                            <li class="breadcrumb-item active">{{ $data['tool']->name }}</li>
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

<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
                Start Our Skill Block
            ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<div class="our-skill-block pd-b-130">
    <div class="container">
        <div class="row align-items-start">
            <div class="col-lg-5 col-md-6">
                <div class="our-content-area">
                    <div class="single-thumb post-thumb">
                        <img class="w-100 h-100" src="{{ asset('/storage/images/tools/'.$data['tool']->file_image) }}" alt="{ $tool->file_image }}" />
                    </div>

                </div>
            </div>
            <div class="col-lg-7 col-md-6">
                <div class="skill-thumbnail-area ms-mrt-55 justify-content-start">
                    <div class="section-title">
                        <h2 class="section-title title-main">{{ $data['tool']->name }}</h2>
                        <h4 class="sub-title">{{ $data['tool']->type }}: Rp {{ $data['tool']->cost }} / Hari</h4>
                        <div class="title-text" style="color: black">
                            @foreach($data['tool']->description as $desc)
                            @if ($desc == "#")
                            <br />
                            @else
                            {{$desc}}
                            @endif
                            @endforeach
                        </div>
                    </div>
                    <!-- /.section-title -->
                    <div class="skill-list service-item" style="padding: 24px; margin: 0; width: 100%">
                        <div class="single-skill">
                            <h3 class="skill-title">Sewa</h3>
                            <form action="{{ route('rental.checkout', $data['tool']->slug) }}" method="POST" class="php-email-form">
                                @csrf
                                <div class="form-group">
                                    <label class="w-50">Lokasi</label>
                                    <div class="w-100 position-relative d-flex align-items-center">
                                        <input class="form-controller" id="location" name="location" type="text" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="w-50">Durasi Sewa</label>
                                    <input hidden id="price" value="{{ $data['tool']->price }}" />
                                    <div class="position-relative d-flex align-items-center w-100">
                                        <input onchange="calculate()" class="form-controller" id="duration" name="duration" type="number" min="1" max="14" value="1" required />
                                        <div class="position-absolute" style="right: 1rem; color: black;">Hari</div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="w-50">Tanggal Mulai</label>
                                    <div class="w-100 position-relative d-flex align-items-center">
                                        <input onchange="calculate()" class="form-controller" id="start_date" name="start_date" type="date" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="w-50">Tanggal Selesai</label>
                                    <div class="w-100 position-relative d-flex align-items-center">
                                        <input class="form-controller" id="end_date" name="end_date" type="text" value="" readonly />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="w-50">Pilih Pembayaran</label>
                                    <div class="w-100 d-flex flex-wrap">
                                        <div onclick="setStatus('lunas')" id="lunas" class="btn-sm py-1 px-4 btn-primary mt-1 mr-1 mb-1 actived" style="font-size: .75em">Lunas</div>
                                        <div onclick="setStatus('dp')" id="dp" class="btn-sm py-1 px-4 btn-primary m-1" style="font-size: .75em">DP 50%</div>
                                        <input hidden name="status" id="status" value="" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="w-50" id="harga">Harga Lunas</label>
                                    <div class="w-100 position-relative d-flex align-items-center">
                                        <div class="position-absolute" style="left: 0.75em; color: black;">Rp</div>
                                        <input class="form-controller" style="padding-left: 2em" id="payment_amount" name="payment_amount" value="{{ $data['tool']->cost }}" type="text" readonly />
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Bayar</button>
                            </form>
                        </div>
                    </div>
                    <!-- /.skill-list -->
                </div>
                <!-- /.skill-thumbnail-area -->
            </div>
        </div>
    </div>
    <!-- /.container -->
</div>
<!--~~./ end our skill block ~~-->

@endsection

<script>
    var status = ""

    function setEndDate(date) {
        var month = ['', 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        var dd = String(date.getDate()).padStart(2, '0');
        var mm = String(date.getMonth() + 1);
        var yyyy = date.getFullYear();
        date = dd + '-' + month[mm] + '-' + yyyy;
        return date;
    }

    function setStatus(value) {
        this.status = value;
        console.log(this.status);
        document.getElementById('status').value = status;
        if (value == 'dp') {
            document.getElementById('dp').classList.add("actived")
            document.getElementById('lunas').classList.remove("actived")
            document.getElementById('harga').innerHTML = "Harga DP 50%";
        } else {
            document.getElementById('lunas').classList.add("actived")
            document.getElementById('dp').classList.remove("actived")
            document.getElementById('harga').innerHTML = "Harga Lunas";
        }
        calculate();
    }

    function calculate() {
        var price = parseInt(document.getElementById('price').value);
        if (this.status == 'dp') {
            price = price / 2
        }
        var duration = parseInt(document.getElementById('duration').value);
        if (!duration) return document.getElementById('payment_amount').value = 0;
        var final_price = duration * price;
        var final = new Number(final_price).toLocaleString("en-US");
        document.getElementById('payment_amount').value = final;

        var start = document.getElementById('start_date').value;
        if (!start) return;
        var end = new Date(start);
        end.setDate(end.getDate() + (duration - 1));
        document.getElementById('end_date').value = setEndDate(end);
    }
</script>

<style>
    .btn-primary.actived {
        background-color: #f75e1e !important;
        cursor: default;
    }

    .btn-primary.actived:hover,
    .btn-primary.actived:focus {
        background-color: #f75e1e !important;
        box-shadow: 3px 6px 20px -7px rgba(247, 94, 30);
        cursor: default;
    }
</style>
