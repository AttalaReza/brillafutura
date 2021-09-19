<?php

namespace App\Exports;

use App\Models\Payment;
use App\Models\Rental;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class RentalsExport implements FromView, ShouldAutoSize
{
    public function __construct(int $month, int $year)
    {
        $this->month = $month;
        $this->year = $year;
    }
    public function view(): View
    {
        $month_name = [
            'All',
            'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli ',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember',
        ];
        $rentals = Rental::all();
        $rental_id = [];
        foreach ($rentals as $rental) {
            array_push($rental_id, $rental->id);
        }
        if ($this->month == 0) {
            $payments = Payment::whereIn('rental_id', $rental_id)
                ->whereIn('status', ['success', 'settlement'])
                ->whereYear('created_at', '=', $this->year)
                ->orderBy('created_at', 'DESC')
                ->get();
        } else {
            $payments = Payment::whereIn('rental_id', $rental_id)
                ->whereIn('status', ['success', 'settlement'])
                ->whereYear('created_at', '=', $this->year)
                ->whereMonth('created_at', '=', $this->month)
                ->orderBy('created_at', 'DESC')
                ->get();
        }
        $income = 0;
        $paid = 0;
        $dp = 0;
        foreach ($payments as $p) {
            if ($p->rental->status == "lunas") {
                $income = $income + $p->rental->payment_amount;
                $paid = $paid + 1;
            } elseif ($p->rental->status == "dp") {
                $income = $income + ($p->rental->payment_amount / 2);
                $dp = $dp + 1;
            }
        }
        $data = [
            'payments' => $payments,
            'month' => $month_name[$this->month],
            'year' => $this->year,
            'income' => $income,
            'paid' => $paid,
            'dp' => $dp,
        ];
        return view('exports.rentals', [
            'data' => $data
        ]);
    }
}
