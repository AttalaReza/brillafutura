@extends('landing.app')

@section('title', 'Brilla Futura - Invoice')

@section('content')
<div style="margin-left: auto; margin-right: auto; display: flex; justify-content: center;">
    <div class="invoice-box">
        <div id="title" style="display: flex; align-items: center; justify-content: space-between;">
            <img src="{{ asset('logo-block.png') }}" width="125" alt="Site Logo" />
            <div class="title">INVOICE</div>
        </div>
        <div id="info" style="display: flex; align-items: start; justify-content: space-between; margin-top: 2.5rem;">
            <div>
                <div>Invoice:</div>
                <div class="customer-name">{{ $data['customer']->name }}</div>
                <div class="m-0">{{ $data['customer']->phone }}</div>
                <div class="m-0">{{ $data['customer']->email }}</div>
                <div class="m-0">{{ $data['customer']->address }}</div>
            </div>
            <div>
                <div class="info-right" style="background: #89B5AF; font-weight: bold; border-radius: 5px;">
                    <div>Invoice No.</div>
                    <div>Tanggal</div>
                </div>
                <div class="info-right">
                    <div>{{ $data['no_invoice'] }}</div>
                    <div>{{ $data['date'] }}</div>
                </div>
            </div>
        </div>
        <div id="details" style="margin-top: 2rem; width: 100%; border-radius: 5px; padding: 1rem 0rem;">
            <div style="display: flex; border-radius: 5px; background: #89B5AF; padding-left: 2rem; font-weight: bold;">
                <div class="details-desc">Deskripsi</div>
                <div class="details-info">Kuantitas</div>
                <div class="details-info">Harga</div>
                <div class="details-info">Total</div>
            </div>
            <div style="display: flex; padding-left: 2rem; border-bottom: 2px solid #BDBDBD; margin-top: 0.5rem;">
                <div class="details-desc" style="padding: 0.5rem 0">
                    {{ $data['payment']->desc }} <br />
                    Lokasi: {{ $data['payment']->location }} <br />
                    {{ $data['payment']->schedule }}
                </div>
                <div class="details-info">{{ $data['payment']->qty }}</div>
                <div class="details-info">{{ $data['payment']->price }}</div>
                <div class="details-info"><b>{{ $data['payment']->total }}</b></div>
            </div>
            <div style="height: 4rem; display: flex; align-items: center; justify-content: center">
                @if ($data['payment']->code != '')
                <div style="border-radius: 5px; border: 2px solid #BDBDBD; padding: 0.5rem 3rem; display: flex; align-items: center; justify-content: center"><b>KODE TIKET : {{ $data['payment']->code }}</b></div>
                @endif
            </div>
            <div style="display: flex; border-top: 2px solid #BDBDBD; padding-top: 1rem;">
                <div style="display: flex; align-items: center; text-transform: uppercase; font-size: 1rem"><b>{{ $data['payment']->payment_status }}</b></div>
                <div style="border-radius: 5px; margin-left: auto; background: #89B5AF; padding: 0.5rem 0; width: 50%">
                    <div style="display: flex;">
                        <div style="display: flex; align-items: start; justify-content: start; width: 50%; padding-left: 1rem;"><b>Total </b></div>
                        <div style="display: flex; align-items: start; justify-content: start; width: 50%; padding-left: 1rem;"><b>Rp {{ $data['payment']->total }}</b></div>
                    </div>
                    @if ($data['payment']->payment_status == 'dp')
                    @php ($data['payment']->last_total = number_format($data['payment']->last_total/2) )
                    <div style="display: flex; margin-top: 0.5rem;">
                        <div style="display: flex; align-items: start; justify-content: start; width: 50%; padding-left: 1rem;"><b>Total DP 50%</b></div>
                        <div style="display: flex; align-items: start; justify-content: start; width: 50%; padding-left: 1rem;"><b>Rp {{ $data['payment']->last_total }}</b></div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div id="footer" style="margin-top: 2rem; display: flex; justify-content: space-between;">
            <div style="width: 50%">
                <b style="margin-bottom: 0.5rem;">Pembayaran telah dilakukan melalui:</b>
                <div>Midtrans.com</div>
                @if ($data['payment']->tnc != '')
                <br />
                <div>{{ $data['payment']->tnc }}</div>
                @endif
            </div>
            <div style="width: 30%; display: flex; justify-content: end; align-items: end">www.brilla-futura.com</div>
        </div>
    </div>
</div>

@endsection

<style>
    .invoice-box {
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #4F4F4F;
        font-size: 0.75rem;
        line-height: 1rem;
        width: 40rem;
        padding: 6rem 4rem;
        margin: 2rem;
        outline: 3px solid #BDBDBD;
        outline-offset: -1rem;
        background: #F2F2F2;
    }

    .invoice-box .title {
        font-size: 2rem;
        font-weight: bold;
        margin: 0;
    }

    .invoice-box .customer-name {
        font-size: 1rem;
        font-weight: bold;
        margin: 0.75rem 0 0.5rem 0;
    }

    .invoice-box .info-right {
        display: flex;
        padding: 0.5rem 0;
    }

    .invoice-box .info-right div {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 8rem;
    }

    .invoice-box .line-left {
        border-left: 5px solid #BDBDBD;
        border-radius: 5px;
        height: 100%;
        width: 2rem;
    }

    .invoice-box .line-right {
        border-right: 5px solid #BDBDBD;
        border-radius: 5px;
        height: 100%;
        width: 2rem;
    }

    .invoice-box .details-desc {
        padding: 0.5rem 0;
        width: 40%;
        display: flex;
        align-items: center;
        justify-content: start;
    }

    .invoice-box .details-info {
        padding: 0.5rem 0;
        width: 20%;
        display: flex;
        align-items: start;
        justify-content: center;
    }
</style>
