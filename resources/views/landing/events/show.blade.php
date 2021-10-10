@extends('landing.app')

@section('title')
{{ $data['event']->name }}
@endsection

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
                        <h2 class="page-title">Events</h2>
                    </div>
                    <!--~~./ page-header-caption ~~-->
                    <div class="breadcrumb-area">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('landing') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('landing.events') }}">Events</a>
                            </li>
                            <li class="breadcrumb-item active">{{ $data['event']->name }}</li>
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
                Start Blog Page Block
            ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<div class="blog-page-block ptb-130">
    <div class="container">
        <!-- Content Row -->
        <div class="row">
            <div class="col-lg-8">
                <!-- Blog Items -->
                <div class="blog-latest-items">
                    <article class="post">
                        <div class="post-thumb-area">
                            <figure class="post-thumb">
                                <a href="{{ asset('/storage/images/events/'.$data['event']->file_image) }}" target="_blank">
                                    <img src="{{ asset('/storage/images/events/'.$data['event']->file_image) }}" alt="{{ $data['event']->file_image }}" width="100%" />
                                </a>
                            </figure>
                            <!-- /.post-thumb -->
                        </div>
                        <!-- /.post-thumb-area -->

                        <div class="post-details">
                            <h2 class="entry-title">
                                <a href="#">{{ $data['event']->name }}</a>
                            </h2>
                            <!-- /.entry-title -->
                            <div class="entry-meta">
                                <div class="entry-meta-author">
                                    <div class="entry-author-name">
                                        Location: <b>{{ $data['event']->location }}</b>
                                    </div>
                                </div>
                                <!--./ entry-meta-author -->
                                <div class="entry-date">{{ $data['event']->date }}</div>
                                <!--./ entry-date -->
                            </div>
                            <!-- /.entry-meta -->
                            <div class="entry-content">
                                <p>{{ $data['event']->description }}</p>
                            </div>
                            <!-- /.entry-content -->
                        </div>
                        <!-- /.post-details -->
                    </article>
                    <!-- /.post -->
                </div>
                <!-- /.blog-latest-items -->

            </div>
            <!--  /.col-lg-8 -->
            <div class="col-lg-4">
                <!-- Sidebar Items -->
                <div class="sidebar-items">

                    <aside class="widget widget_search">
                        <h4>Order Information</h4>
                    </aside>

                    <!--~~~~~ Start Post List Widget~~~~~-->
                    <aside class="widget widget-post-list">
                        <h4 class="widget-title">Tickets</h4>
                        <!-- /.widget-title -->

                        <div class="widget-content">
                            <!-- Presale 1 -->
                            <article class="post">
                                <div class="thumb-wrap">
                                    <img src="{{ asset('/albireo/ticket.png') }}" alt="post" />
                                </div>
                                <!--./ thumb-wrap -->
                                <div class="content-entry-wrap">
                                    <h3 class="entry-title">Presale 1</h3>
                                    <h3 class="entry-title">Rp{{ $data['event']->presale_1_price }}</h3>
                                    <!--./ entry-title -->
                                    <div class="entry-meta">
                                        <div class="entry-date">
                                            @if ($data['event']->presale_1_ticket_info === "Tickets Sold Out!")
                                            <span style="color: #f75e1e;"><b>{{ $data['event']->presale_1_ticket_info }}</b></span>
                                            @else
                                            <span style="color: #158682;"><b>{{ $data['event']->presale_1_ticket_info }}</b></span>
                                            @endif
                                        </div>
                                        <div class="entry-date">
                                            <span>{{ $data['event']->presale_1_date }}</span>
                                        </div>
                                    </div>
                                    <!--./ entry-meta -->
                                </div>
                            </article>
                            <!--./ end post -->
                            <!-- Presale 2 -->
                            <article class="post">
                                <div class="thumb-wrap">
                                    <img src="{{ asset('/albireo/ticket.png') }}" alt="post" />
                                </div>
                                <!--./ thumb-wrap -->
                                <div class="content-entry-wrap">
                                    <h3 class="entry-title">Presale 2</h3>
                                    <h3 class="entry-title">Rp{{ $data['event']->presale_2_price }}</h3>
                                    <!--./ entry-title -->
                                    <div class="entry-meta">
                                        <div class="entry-date">
                                            @if ($data['event']->presale_2_ticket_info === "Tickets Sold Out!")
                                            <span style="color: #f75e1e;"><b>{{ $data['event']->presale_2_ticket_info }}</b></span>
                                            @else
                                            <span style="color: #158682;"><b>{{ $data['event']->presale_2_ticket_info }}</b></span>
                                            @endif
                                        </div>
                                        <div class="entry-date">
                                            <span>{{ $data['event']->presale_2_date }}</span>
                                        </div>
                                    </div>
                                    <!--./ entry-meta -->
                                </div>
                            </article>
                            <!--./ end post -->
                            <!-- Onsale  -->
                            <article class="post">
                                <div class="thumb-wrap">
                                    <img src="{{ asset('/albireo/ticket.png') }}" alt="post" />
                                </div>
                                <!--./ thumb-wrap -->
                                <div class="content-entry-wrap">
                                    <h3 class="entry-title">Onsale</h3>
                                    <h3 class="entry-title">Rp{{ $data['event']->onsale_price }}</h3>
                                    <!--./ entry-title -->
                                    <div class="entry-meta">
                                        <div class="entry-date">
                                            @if ($data['event']->onsale_ticket_info === "Tickets Sold Out!")
                                            <span style="color: #f75e1e;"><b>{{ $data['event']->onsale_ticket_info }}</b></span>
                                            @else
                                            <span style="color: #158682;"><b>{{ $data['event']->onsale_ticket_info }}</b></span>
                                            @endif
                                        </div>
                                        <div class="entry-date">
                                            <span>{{ $data['event']->onsale_date }}</span>
                                        </div>
                                    </div>
                                    <!--./ entry-meta -->
                                </div>
                            </article>
                            <!--./ end post -->
                        </div>
                    </aside>
                    <!--~./ end post list widget ~-->

                    <!--~~~~~ Start Order Here Widget ~~~~~-->
                    <aside class="widget widget_categories">
                        <h4 class="widget-title">Order Here</h4>
                        <!-- /.widget-title -->
                        <div class="widget-content">
                            <form action="{{ route('ticket.checkout') }}" method="POST" class="php-email-form">
                                @csrf

                                <ul>
                                    @if ($data['event']->presale_1_status === "open")
                                    <li>
                                        <div class="form-group" style="display: flex; align-items: center; justify-content: space-between;">
                                            <div style="width: 50%;">Ticket</div>
                                            <input hidden id="ticket" name="ticket" value="presale_1" type="text" readonly />
                                            <input class="form-controller" id="_ticket" name="_ticket" value="Presale 1" type="text" readonly />
                                        </div>
                                        <div class="form-group" style="display: flex; align-items: center; justify-content: space-between;">
                                            <div style="width: 50%;">Amount</div>
                                            <input onchange="calculate(placeholder)" class="form-controller" id="amount" name="amount" placeholder="{{ $data['event']->presale_1 }}" type="number" min="1" max="{{ $data['event']->presale_1_ticket }}" value="1" required />
                                        </div>
                                        <div class="form-group" style="display: flex; align-items: center; justify-content: space-between;">
                                            <div style="width: 50%;">Price</div>
                                            <input class="form-controller" id="payment_amount" name="payment_amount" value="{{ $data['event']->presale_1_price }}" type="text" readonly />
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-block">Checkout</button>
                                    </li>
                                    @endif
                                    @if ($data['event']->presale_2_status === "open")
                                    <li>
                                        <div class="form-group" style="display: flex; align-items: center; justify-content: space-between;">
                                            <div style="width: 50%;">Ticket</div>
                                            <input hidden id="ticket" name="ticket" value="presale_2" type="text" readonly />
                                            <input class="form-controller" id="_ticket" name="_ticket" value="Presale 2" type="text" readonly />
                                        </div>
                                        <div class="form-group" style="display: flex; align-items: center; justify-content: space-between;">
                                            <div style="width: 50%;">Amount</div>
                                            <input onchange="calculate(placeholder)" class="form-controller" id="amount" name="amount" placeholder="{{ $data['event']->presale_2 }}" type="number" min="1" max="{{ $data['event']->presale_2_ticket }}" value="1" required />
                                        </div>
                                        <div class="form-group" style="display: flex; align-items: center; justify-content: space-between;">
                                            <div style="width: 50%;">Price</div>
                                            <input class="form-controller" id="payment_amount" name="payment_amount" value="{{ $data['event']->presale_2_price }}" type="text" readonly />
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-block">Checkout</button>
                                    </li>
                                    @endif
                                    @if ($data['event']->onsale_status === "open")
                                    <li>
                                        <div class="form-group" style="display: flex; align-items: center; justify-content: space-between;">
                                            <div style="width: 50%;">Ticket</div>
                                            <input hidden id="ticket" name="ticket" value="onsale" type="text" readonly />
                                            <input class="form-controller" id="_ticket" name="_ticket" value="Onsale" type="text" readonly />
                                        </div>
                                        <div class="form-group" style="display: flex; align-items: center; justify-content: space-between;">
                                            <div style="width: 50%;">Amount</div>
                                            <input onchange="calculate(placeholder)" class="form-controller" id="amount" name="amount" placeholder="{{ $data['event']->onsale }}" type="number" min="1" max="{{ $data['event']->onsale_ticket }}" value="1" required />
                                        </div>
                                        <div class="form-group" style="display: flex; align-items: center; justify-content: space-between;">
                                            <div style="width: 50%;">Price</div>
                                            <input class="form-controller" id="payment_amount" name="payment_amount" value="{{ $data['event']->onsale_price }}" type="text" readonly />
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-block">Checkout</button>
                                    </li>
                                    @endif
                                </ul>
                            </form>
                        </div>
                        <!-- /.widget-content -->
                    </aside>
                    <!--~./ end categories widget ~-->
                </div>
                <!--  /.sidebar-items -->
            </div>
            <!-- /.col-lg-4 -->
        </div>
        <!--  /.row -->
    </div>
    <!--  /.container -->
</div>
<!--~~./ end blog page ~~-->


@endsection

<script>
    function calculate(price) {
        var amount = parseInt(document.getElementById('amount').value);
        var final_price = amount * price;
        var final = new Number(final_price).toLocaleString("en-US");
        document.getElementById('payment_amount').value = final;
    }
</script>
