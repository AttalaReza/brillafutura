<table border="1">
    <tr>
        <th><b>Kategori</b></th>
        <th><b>Terjual</b></th>
        <th><b>Stok</b></th>
        <th><b>Pendapatan</b></th>
        <th></th>
        <th></th>
        <th></th>
    </tr>
    <tr>
        <td>Presale 1</td>
        <td>{{ $data['details']['presale_1_sold'] }}</td>
        <td>{{ $data['details']['presale_1_remaining'] }}</td>
        @php ($t = number_format($data['details']['presale_1']))
        <td><b> {{ $t }}</b></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td>Presale 2</td>
        <td>{{ $data['details']['presale_2_sold'] }}</td>
        <td>{{ $data['details']['presale_2_remaining'] }}</td>
        @php ($t = number_format($data['details']['presale_2']))
        <td><b> {{ $t }}</b></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td>Onsale</td>
        <td>{{ $data['details']['onsale_sold'] }}</td>
        <td>{{ $data['details']['onsale_remaining'] }}</td>
        @php ($t = number_format($data['details']['onsale']))
        <td><b> {{ $t }}</b></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <th><b>Total</b></th>
        @php ($total = number_format($data['details']['presale_1_sold'] + $data['details']['presale_2_sold'] + $data['details']['onsale_sold']))
        <th><b>{{ $total }} Tiket</b></th>
        @php ($total = number_format($data['details']['presale_1_remaining'] + $data['details']['presale_2_remaining'] + $data['details']['onsale_remaining']))
        <th><b>{{ $total }} Tiket</b></th>
        @php ($total = number_format($data['details']['presale_1'] + $data['details']['presale_2'] + $data['details']['onsale']))
        <th><b> {{ $total }}</b></th>
        <th></th>
        <th></th>
        <th></th>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <th><b>No Invoice</b></th>
        <th><b>Waktu Beli</b></th>
        <th><b>Pembeli</b></th>
        <th><b>Kategori</b></th>
        <th><b>Harga Tiket</b></th>
        <th><b>Jumlah</b></th>
        <th><b>Total</b></th>
        <th><b>Kode</b></th>
    </tr>
    @foreach ($data['payments'] as $payment)
    <tr>
        @php ($time = date("G:i", strtotime($payment->created_at)))
        @php ($date = date("d M Y", strtotime($payment->created_at)))
        <td>{{ $date }}, {{ $time }}</td>
        <td>{{ $payment->user->name }}</td>
        <td>{{ $payment->purchase->ticket }}</td>
        @php ($tp = number_format($payment->purchase->ticket_price))
        <td>{{ $tp }}</td>
        <td>{{ $payment->purchase->amount }} tiket</td>
        @php ($pa = number_format($payment->purchase->payment_amount))
        <td><b>{{ $pa }}</b></td>
        <td> {{ $payment->purchase->code }} </td>
    </tr>
    @endforeach
</table>
