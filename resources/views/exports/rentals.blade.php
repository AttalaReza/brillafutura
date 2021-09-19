<table border="1">
    <tr>
        <td>Bulan</td>
        <td><b>{{ $data['month'] }}</b></td>
    </tr>
    <tr>
        <td>Tahun</td>
        <td><b>{{ $data['year'] }}</b></td>
    </tr>
    <tr>
        <td>Income</td>
        @php ($i = number_format($data['income']))
        <td><b>{{ $i }}</b></td>
    </tr>
    <tr>
        <td>Lunas</td>
        <td><b>{{ $data['paid'] }}</b></td>
    </tr>
    <tr>
        <td>DP</td>
        <td><b>{{ $data['dp'] }}</b></td>
    </tr>
    <tr></tr>
    <tr>
        <th><b>Penyewa</b></th>
        <th><b>Alat</b></th>
        <th><b>Harga</b></th>
        <th><b>Tanggal Sewa</b></th>
        <th><b>Lokasi</b></th>
        <th><b>Biaya</b></th>
        <th><b>Tanggal Bayar</b></th>
        <th><b>Tipe</b></th>
        <th><b>Status</b></th>
    </tr>
    @foreach ($data['payments'] as $payment)
    <tr>
        <td>{{ $payment->rental->user->name }}</td>
        <td>{{ $payment->rental->tool->name }}</td>
        @php ($pp = number_format($payment->rental->tool->price))
        <td>{{ $pp }}</td>
        @isset ($payment->rental->end_date)
        @if ($payment->rental->start_date == $payment->rental->end_date)
        @php ($date = date("j M Y", strtotime($payment->rental->start_date)))
        @else
        @php ($date = date("j", strtotime($payment->rental->start_date)) . "-" . date("j M Y", strtotime($payment->rental->end_date)))
        @endif
        @endisset
        @empty ($payment->rental->end_date)
        @php ($date = date("j M Y", strtotime($payment->rental->start_date)))
        @endempty
        <td>{{ $date }}</td>
        <td>{{ $payment->rental->location }}</td>
        @php ($pa = number_format($payment->rental->payment_amount))
        <td><b>{{ $pa }}</b></td>
        @php ($date = date("j M Y, H:i", strtotime($payment->created_at)))
        <td>{{ $date }}</td>
        <td>{{ $payment->type }}</td>
        <td>
            @if ($payment->rental->status == "lunas")
            Lunas
            @else
            Sudah DP 50%
            @endif
        </td>
    </tr>
    @endforeach
</table>
