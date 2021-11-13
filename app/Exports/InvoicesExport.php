<?php

namespace App\Exports;

use App\Models\Payment;

// use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class InvoicesExport implements FromView, ShouldAutoSize
{
    public function __construct(int $id)
    {
        $this->payment_id = $id;
    }
    public function view(): View
    {
        $payment = Payment::find($this->payment_id);
        $data = '';
        return view('exports.invoice', [
            'data' => $data
        ]);
    }
}
