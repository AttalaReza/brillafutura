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
                                <a href="{{ route('landing') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('landing.rentals') }}">Sewa Alat</a>
                            </li>
                            <li class="breadcrumb-item active">{{ $data['tool']->name }}</li>
                            < </ol>
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
        <h2 class="title-main">{{ $data['tool']->name }}</h2>
        <div class="row align-items-start">
            <div class="col-lg-5 col-md-6">
                <div class="our-content-area">
                    <div class="single-thumb post-thumb">
                        <img src="{{ asset('/storage/images/tools/'.$data['tool']->file_image) }}" alt="{ $tool->file_image }}" />
                    </div>

                </div>
            </div>
            <div class="col-lg-7 col-md-6">
                <div class="skill-thumbnail-area ms-mrt-55">
                    <div class="section-title">
                        <h4 class="sub-title">{{ $data['tool']->type }}: Rp {{ $data['tool']->cost }} / Day</h4>
                        <div class="title-text" style="color: black">
                            {{ $data['tool']->description }}
                        </div>
                    </div>
                    <!-- /.section-title -->
                    <div class="skill-list" style="width: 100%">
                        <div class="single-skill" style="color: black">
                            <h3 class="skill-title">Rentals Here</h3>
                            <form action="{{ route('rental.checkout', $data['tool']->slug) }}" method="POST" class="php-email-form">
                                @csrf
                                <div class="form-group d-flex align-items-center justify-content-between">
                                    <label class="w-50" style="color: black">Location</label>
                                    <input class="form-controller" id="location" name="location" type="text" required />
                                </div>
                                <div class="form-group d-flex align-items-center justify-content-between">
                                    <label class="w-50" style="color: black">Start Date</label>
                                    <input onchange="calculate()" class="form-controller" id="start_date" name="start_date" type="date" required />
                                </div>
                                <div class="form-group d-flex align-items-center justify-content-between">
                                    <label class="w-50" style="color: black">Duration in Day</label>
                                    <input hidden id="price" value="{{ $data['tool']->price }}" />
                                    <input onchange="calculate()" class="form-controller" id="duration" name="duration" type="number" min="1" value="1" required />
                                </div>
                                <div class="form-group d-flex align-items-center justify-content-between">
                                    <label class="w-50" style="color: black">End Date</label>
                                    <input class="form-controller" id="end_date" name="end_date" type="text" value="" readonly />
                                </div>
                                <div class="form-group d-flex align-items-center justify-content-between">
                                    <label class="w-50" style="color: black">Price</label>
                                    <input class="form-controller" id="payment_amount" name="payment_amount" value="{{ $data['tool']->cost }}" type="text" readonly />
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Checkout</button>
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
    function setEndDate(date) {
        var month = ['', 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        var dd = String(date.getDate()).padStart(2, '0');
        var mm = String(date.getMonth() + 1);
        var yyyy = date.getFullYear();
        date = dd + '-' + month[mm] + '-' + yyyy;
        return date;
    }

    function calculate() {
        var duration = parseInt(document.getElementById('duration').value);
        var price = parseInt(document.getElementById('price').value);
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
