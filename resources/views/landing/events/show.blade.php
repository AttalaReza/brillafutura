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
                        <h2 class="page-title">{{ $data['event']->name }}</h2>
                    </div>
                    <!--~~./ page-header-caption ~~-->
                    <div class="breadcrumb-area">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('landing') }}">Beranda</a>
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
            <div class="col-lg-7">
                <!-- Blog Items -->
                <div class="blog-latest-items">
                    <article class="post">
                        <div class="post-thumb-area">
                            <figure class="post-thumb">
                                <a href="{{ asset('/uploads/'.$data['event']->file_image) }}" target="_blank">
                                    <img src="{{ asset('/uploads/'.$data['event']->file_image) }}" alt="{{ $data['event']->file_image }}" width="100%" />
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
                                        <table>
                                            <tr>
                                                <td width="100">
                                                    <h4 style="margin: 0;">Lokasi</h4>
                                                </td>
                                                <td width="20">
                                                    <h4 style="margin: 0;">:</h4>
                                                </td>
                                                <td>
                                                    <h4 style="margin: 0;">{{ $data['event']->location }}</h4>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h4 style="margin: 0;">Tanggal</h4>
                                                </td>
                                                <td>
                                                    <h4 style="margin: 0;">:</h4>
                                                </td>
                                                <td>
                                                    <h4 style="margin: 0;">{{ $data['event']->day.", ".$data['event']->date }}</h4>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <!--./ entry-meta-author -->
                                <!-- <div class="entry-date">{{ $data['event']->date }}</div> -->
                                <!--./ entry-date -->
                            </div>
                            <!-- /.entry-meta -->
                            <div class="entry-content">
                                <p>
                                    @foreach($data['event']->description as $desc)
                                    @if ($desc == "#")
                                    <br />
                                    @else
                                    {{$desc}}
                                    @endif
                                    @endforeach
                                </p>
                                <br />
                                <h4>Syarat dan Ketentuan</h4>
                                <p>
                                    Setelah menyelesaikan pembelian di situs web dan outlet kami, Anda akan mendapatkan Kode Tiket di dalam E-voucher dari Brilla Futura pada halaman profile Anda.
                                    Anda dapat menukarkan Kode Tiket Anda pada waktu dan tempat Event akan berlangsung.
                                <p>
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
            <div class="col-lg-5">
                <!-- Sidebar Items -->
                <div class="sidebar-items">

                    <aside class="widget widget_search">
                        <h4>Informasi Tiket</h4>
                    </aside>

                    <!--~~~~~ Start Post List Widget~~~~~-->
                    <aside class="widget widget-post-list">
                        <h4 class="widget-title">Tiket</h4>
                        <!-- /.widget-title -->

                        <div class="widget-content">
                            <!-- Presale 1 -->
                            <article class="post">
                                <div class="thumb-wrap" style="position: relative">
                                    @if ($data['event']->presale_1_ticket_info === "Tickets Sold Out!")
                                    <img style="position: absolute; top: 16px" src="{{ asset('/albireo/sold-out.png') }}" alt="post" />
                                    @endif
                                    <img src="{{ asset('/albireo/ticket.png') }}" alt="post" />
                                </div>
                                <!--./ thumb-wrap -->
                                <div class="content-entry-wrap">
                                    <h3 class="entry-title"><b>Presale 1</b></h3>
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
                                <div class="thumb-wrap" style="position: relative">
                                    @if ($data['event']->presale_2_ticket_info === "Tickets Sold Out!")
                                    <img style="position: absolute; top: 16px" src="{{ asset('/albireo/sold-out.png') }}" alt="post" />
                                    @endif
                                    <img src="{{ asset('/albireo/ticket.png') }}" alt="post" />
                                </div>
                                <!--./ thumb-wrap -->
                                <div class="content-entry-wrap">
                                    <h3 class="entry-title"><b>Presale 2</b></h3>
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
                                <div class="thumb-wrap" style="position: relative">
                                    @if ($data['event']->onsale_ticket_info === "Tickets Sold Out!")
                                    <img style="position: absolute; top: 16px" src="{{ asset('/albireo/sold-out.png') }}" alt="post" />
                                    @endif
                                    <img src="{{ asset('/albireo/ticket.png') }}" alt="post" />
                                </div>
                                <!--./ thumb-wrap -->
                                <div class="content-entry-wrap">
                                    <h3 class="entry-title"><b>Onsale</b></h3>
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
                    <aside class="widget widget_categories service-item" style="padding: 24px; margin: 0;">
                        <h4 class="widget-title">Pesan Tiket</h4>
                        <!-- /.widget-title -->
                        <div class="widget-content">
                            <form action="{{ route('ticket.checkout', $data['event']->slug) }}" method="POST" class="php-email-form">
                                @csrf
                                <ul>
                                    @if ($data['event']->presale_1_status === "open")
                                    <li>
                                        <div class="form-group d-flex align-items-center justify-content-between">
                                            <label class="w-50">Ticket</label>
                                            <div class="w-100 position-relative d-flex align-items-center">
                                                <input hidden id="ticket" name="ticket" value="Presale 1" type="text" readonly />
                                                <input class="form-controller" id="_ticket" name="_ticket" value="Presale 1" type="text" readonly />
                                            </div>
                                        </div>
                                        <div class="form-group d-flex align-items-center justify-content-between">
                                            <label class="w-50">Harga</label>
                                            <div class="w-100 position-relative d-flex align-items-center">
                                                <input class="form-controller" id="p" name="p" value="Rp {{ $data['event']->presale_1_price }}" readonly />
                                            </div>
                                        </div>
                                        <div class="form-group d-flex align-items-start justify-content-between">
                                            <label class="w-50 mt-1">Jumlah Tiket</label>
                                            <input hidden id="ticket_price" name="ticket_price" value="{{ $data['event']->presale_1 }}" readonly />
                                            <input hidden id="amount" name="amount" value="1" readonly />
                                            <div class="w-100 d-flex flex-wrap align-items-center justify-content-center">
                                                <div onclick="setAmount(1)" id="amount_1" class="btn-sm py-1 px-4 d-flex align-items-center justify-content-center btn-primary m-1 actived" style="font-size: .75em;">1 Tiket</div>
                                                @if ($data['event']->presale_1_ticket >= 2)
                                                <div onclick="setAmount(2)" id="amount_2" class="btn-sm py-1 px-4 d-flex align-items-center justify-content-center btn-primary m-1" style="font-size: .75em;">2 Tiket</div>
                                                @else
                                                <div id="amount_2" class="btn-sm py-1 px-4 d-flex align-items-center justify-content-center btn-disabled m-1" style="font-size: .75em;">2 Tiket</div>
                                                @endif
                                                @if ($data['event']->presale_1_ticket >= 3)
                                                <div onclick="setAmount(3)" id="amount_3" class="btn-sm py-1 px-4 d-flex align-items-center justify-content-center btn-primary m-1" style="font-size: .75em;">3 Tiket</div>
                                                @else
                                                <div id="amount_3" class="btn-sm py-1 px-4 d-flex align-items-center justify-content-center btn-disabled m-1" style="font-size: .75em;">3 Tiket</div>
                                                @endif
                                                @if ($data['event']->presale_1_ticket >= 4)
                                                <div onclick="setAmount(4)" id="amount_4" class="btn-sm py-1 px-4 d-flex align-items-center justify-content-center btn-primary m-1" style="font-size: .75em;">4 Tiket</div>
                                                @else
                                                <div id="amount_4" class="btn-sm py-1 px-4 d-flex align-items-center justify-content-center btn-disabled m-1" style="font-size: .75em;">4 Tiket</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group d-flex align-items-center justify-content-between">
                                            <label class="w-50">Total</label>
                                            <div class="w-100 position-relative d-flex align-items-center">
                                                <div class="position-absolute" style="left: 0.75em">Rp</div>
                                                <input class="form-controller" style="padding-left: 2em" id="payment_amount_str" name="payment_amount_str" value="{{ $data['event']->presale_1_price }}" type="text" readonly />
                                                <input hidden class="form-controller" style="padding-left: 2em" id="payment_amount" name="payment_amount" value="" type="number" readonly />
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-block">Beli Tiket</button>
                                    </li>
                                    @elseif ($data['event']->presale_2_status === "open")
                                    <li>
                                        <div class="form-group d-flex align-items-center justify-content-between">
                                            <label class="w-50">Ticket</label>
                                            <div class="w-100 position-relative d-flex align-items-center">
                                                <input hidden id="ticket" name="ticket" value="Presale 2" type="text" readonly />
                                                <input class="form-controller" id="_ticket" name="_ticket" value="Presale 2" type="text" readonly />
                                            </div>
                                        </div>
                                        <div class="form-group d-flex align-items-center justify-content-between">
                                            <label class="w-50">Harga</label>
                                            <div class="w-100 position-relative d-flex align-items-center">
                                                <input class="form-controller" id="p" name="p" value="Rp {{ $data['event']->presale_2_price }}" readonly />
                                            </div>
                                        </div>
                                        <div class="form-group d-flex align-items-start justify-content-between">
                                            <label class="w-50 mt-1">Jumlah Tiket</label>
                                            <input hidden id="ticket_price" name="ticket_price" value="{{ $data['event']->presale_2 }}" readonly />
                                            <input hidden id="amount" name="amount" value="1" readonly />
                                            <div class="w-100 d-flex flex-wrap align-items-center justify-content-center">
                                                <div onclick="setAmount(1)" id="amount_1" class="btn-sm py-1 px-4 d-flex align-items-center justify-content-center btn-primary m-1 actived" style="font-size: .75em;">1 Tiket</div>
                                                @if ($data['event']->presale_2_ticket >= 2)
                                                <div onclick="setAmount(2)" id="amount_2" class="btn-sm py-1 px-4 d-flex align-items-center justify-content-center btn-primary m-1" style="font-size: .75em;">2 Tiket</div>
                                                @else
                                                <div id="amount_2" class="btn-sm py-1 px-4 d-flex align-items-center justify-content-center btn-disabled m-1" style="font-size: .75em;">2 Tiket</div>
                                                @endif
                                                @if ($data['event']->presale_2_ticket >= 3)
                                                <div onclick="setAmount(3)" id="amount_3" class="btn-sm py-1 px-4 d-flex align-items-center justify-content-center btn-primary m-1" style="font-size: .75em;">3 Tiket</div>
                                                @else
                                                <div id="amount_3" class="btn-sm py-1 px-4 d-flex align-items-center justify-content-center btn-disabled m-1" style="font-size: .75em;">3 Tiket</div>
                                                @endif
                                                @if ($data['event']->presale_2_ticket >= 4)
                                                <div onclick="setAmount(4)" id="amount_4" class="btn-sm py-1 px-4 d-flex align-items-center justify-content-center btn-primary m-1" style="font-size: .75em;">4 Tiket</div>
                                                @else
                                                <div id="amount_4" class="btn-sm py-1 px-4 d-flex align-items-center justify-content-center btn-disabled m-1" style="font-size: .75em;">4 Tiket</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group d-flex align-items-center justify-content-between">
                                            <label class="w-50">Total</label>
                                            <div class="w-100 position-relative d-flex align-items-center">
                                                <div class="position-absolute" style="left: 0.75em">Rp</div>
                                                <input class="form-controller" style="padding-left: 2em" id="payment_amount_str" name="payment_amount_str" value="{{ $data['event']->presale_2_price }}" type="text" readonly />
                                                <input hidden class="form-controller" style="padding-left: 2em" id="payment_amount" name="payment_amount" value="" type="number" readonly />
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-block">Beli Tiket</button>
                                    </li>
                                    @elseif ($data['event']->onsale_status === "open")
                                    <li>
                                        <div class="form-group d-flex align-items-center justify-content-between">
                                            <label class="w-50">Ticket</label>
                                            <div class="w-100 position-relative d-flex align-items-center">
                                                <input hidden id="ticket" name="ticket" value="Onsale" type="text" readonly />
                                                <input class="form-controller" id="_ticket" name="_ticket" value="Onsale" type="text" readonly />
                                            </div>
                                        </div>
                                        <div class="form-group d-flex align-items-center justify-content-between">
                                            <label class="w-50">Harga</label>
                                            <div class="w-100 position-relative d-flex align-items-center">
                                                <input class="form-controller" id="p" name="p" value="Rp {{ $data['event']->onsale_price }}" readonly />
                                            </div>
                                        </div>
                                        <div class="form-group d-flex align-items-start justify-content-between">
                                            <label class="w-50 mt-1">Jumlah Tiket</label>
                                            <input hidden id="ticket_price" name="ticket_price" value="{{ $data['event']->onsale }}" readonly />
                                            <input hidden id="amount" name="amount" value="1" readonly />
                                            <div class="w-100 d-flex flex-wrap align-items-center justify-content-center">
                                                <div onclick="setAmount(1)" id="amount_1" class="btn-sm py-1 px-4 d-flex align-items-center justify-content-center btn-primary m-1 actived" style="font-size: .75em;">1 Tiket</div>
                                                @if ($data['event']->onsale_ticket >= 2)
                                                <div onclick="setAmount(2)" id="amount_2" class="btn-sm py-1 px-4 d-flex align-items-center justify-content-center btn-primary m-1" style="font-size: .75em;">2 Tiket</div>
                                                @else
                                                <div id="amount_2" class="btn-sm py-1 px-4 d-flex align-items-center justify-content-center btn-disabled m-1" style="font-size: .75em;">2 Tiket</div>
                                                @endif
                                                @if ($data['event']->onsale_ticket >= 3)
                                                <div onclick="setAmount(3)" id="amount_3" class="btn-sm py-1 px-4 d-flex align-items-center justify-content-center btn-primary m-1" style="font-size: .75em;">3 Tiket</div>
                                                @else
                                                <div id="amount_3" class="btn-sm py-1 px-4 d-flex align-items-center justify-content-center btn-disabled m-1" style="font-size: .75em;">3 Tiket</div>
                                                @endif
                                                @if ($data['event']->onsale_ticket >= 4)
                                                <div onclick="setAmount(4)" id="amount_4" class="btn-sm py-1 px-4 d-flex align-items-center justify-content-center btn-primary m-1" style="font-size: .75em;">4 Tiket</div>
                                                @else
                                                <div id="amount_4" class="btn-sm py-1 px-4 d-flex align-items-center justify-content-center btn-disabled m-1" style="font-size: .75em;">4 Tiket</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group d-flex align-items-center justify-content-between">
                                            <label class="w-50">Total</label>
                                            <div class="w-100 position-relative d-flex align-items-center">
                                                <div class="position-absolute" style="left: 0.75em">Rp</div>
                                                <input class="form-controller" style="padding-left: 2em" id="payment_amount_str" name="payment_amount_str" value="{{ $data['event']->onsale_price }}" type="text" readonly />
                                                <input hidden class="form-controller" style="padding-left: 2em" id="payment_amount" name="payment_amount" value="" type="number" readonly />
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-block">Beli Tiket</button>
                                    </li>
                                    @endif
                                </ul>
                            </form>
                            @if ($data['event']->presale_1_status != "open" && $data['event']->presale_2_status != "open" && $data['event']->onsale_status != "open")
                            <ul>
                                <li>
                                    <div class="form-group d-flex align-items-center justify-content-between">
                                        <label class="w-50">Ticket</label>
                                        <div class="w-100 position-relative d-flex align-items-center">
                                            <input class="form-controller" value="-" type="text" readonly />
                                        </div>
                                    </div>
                                    <div class="form-group d-flex align-items-center justify-content-between">
                                        <label class="w-50">Harga</label>
                                        <div class="w-100 position-relative d-flex align-items-center">
                                            <input class="form-controller" value="Rp -" type="text" readonly />
                                        </div>
                                    </div>
                                    <div class="form-group d-flex align-items-start justify-content-between">
                                        <label class="w-50 mt-1">Jumlah Tiket</label>
                                        <div class="w-100 d-flex flex-wrap align-items-center justify-content-center">
                                            <div id="amount_1" class="btn-sm py-1 px-4 d-flex align-items-center justify-content-center btn-disabled m-1" style="font-size: .75em;">1 Tiket</div>
                                            <div id="amount_2" class="btn-sm py-1 px-4 d-flex align-items-center justify-content-center btn-disabled m-1" style="font-size: .75em;">2 Tiket</div>
                                            <div id="amount_3" class="btn-sm py-1 px-4 d-flex align-items-center justify-content-center btn-disabled m-1" style="font-size: .75em;">3 Tiket</div>
                                            <div id="amount_4" class="btn-sm py-1 px-4 d-flex align-items-center justify-content-center btn-disabled m-1" style="font-size: .75em;">4 Tiket</div>
                                        </div>
                                    </div>
                                    <div class="form-group d-flex align-items-center justify-content-between">
                                        <label class="w-50">Total</label>
                                        <div class="w-100 position-relative d-flex align-items-center">
                                            <div class="position-absolute" style="left: 0.75em">Rp</div>
                                            <input class="form-controller" style="padding-left: 2em" value="-" type="text" readonly />
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block" disabled>Beli Tiket</button>
                                </li>
                            </ul>
                            @endif
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

@include('landing.footer')

@endsection

<script>
    var amount = 1;

    function setAmount(num) {
        this.amount = num;
        calculate();
        if (num == 1) {
            document.getElementById('amount_1').classList.add("actived")
            document.getElementById('amount_2').classList.remove("actived")
            document.getElementById('amount_3').classList.remove("actived")
            document.getElementById('amount_4').classList.remove("actived")
        } else if (num == 2) {
            document.getElementById('amount_2').classList.add("actived")
            document.getElementById('amount_1').classList.remove("actived")
            document.getElementById('amount_3').classList.remove("actived")
            document.getElementById('amount_4').classList.remove("actived")
        } else if (num == 3) {
            document.getElementById('amount_3').classList.add("actived")
            document.getElementById('amount_1').classList.remove("actived")
            document.getElementById('amount_2').classList.remove("actived")
            document.getElementById('amount_4').classList.remove("actived")
        } else if (num == 4) {
            document.getElementById('amount_4').classList.add("actived")
            document.getElementById('amount_1').classList.remove("actived")
            document.getElementById('amount_2').classList.remove("actived")
            document.getElementById('amount_3').classList.remove("actived")
        }
    }

    function calculate() {
        var price = parseInt(document.getElementById('ticket_price').value);
        var final_price = this.amount * price;
        document.getElementById('payment_amount').value = final_price;
        document.getElementById('amount').value = amount;
        var final = new Number(final_price).toLocaleString("en-US");
        document.getElementById('payment_amount_str').value = final;
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

    .btn-disabled {
        cursor: not-allowed;
        border: 1px solid #999999;
        background-color: #cccccc;
        color: #666666;
    }
</style>
