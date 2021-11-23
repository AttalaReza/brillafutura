<?php

namespace App\Exports;

use App\Models\Event;
use App\Models\Payment;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PurchasersExport implements FromView, ShouldAutoSize
{
    public function __construct(int $id)
    {
        $this->event_id = $id;
    }
    public function view(): View
    {
        $event = Event::find($this->event_id);
        $purchase_id = [];
        foreach ($event->purchase as $p) {
            array_push($purchase_id, $p->id);
        }
        $items = Payment::whereIn('purchase_id', $purchase_id)
            ->whereIn('status', ['success', 'settlement'])
            ->orderBy('created_at', 'DESC')
            ->get();
        $details = [
            'presale_1' => 0,
            'presale_2' => 0,
            'onsale' => 0,
            'presale_1_sold' => 0,
            'presale_2_sold' => 0,
            'onsale_sold' => 0,
            'presale_1_remaining' => $event->presale_1_quota,
            'presale_2_remaining' => $event->presale_2_quota,
            'onsale_remaining' => $event->onsale_quota,
        ];
        foreach ($items as $i) {
            if ($i->purchase->ticket == 'presale_1') {
                $details['presale_1'] = $details['presale_1'] + $i->purchase->payment_amount;
                $details['presale_1_sold'] = $details['presale_1_sold'] + $i->purchase->amount;
                $details['presale_1_remaining'] = $details['presale_1_remaining'] - $i->purchase->amount;
            }
            if ($i->purchase->ticket == 'presale_2') {
                $details['presale_2'] = $details['presale_2'] + $i->purchase->payment_amount;
                $details['presale_2_sold'] = $details['presale_2_sold'] + $i->purchase->amount;
                $details['presale_2_remaining'] = $details['presale_2_remaining'] - $i->purchase->amount;
            }
            if ($i->purchase->ticket == 'onsale') {
                $details['onsale'] = $details['onsale'] + $i->purchase->payment_amount;
                $details['onsale_sold'] = $details['onsale_sold'] + $i->purchase->amount;
                $details['onsale_remaining'] = $details['onsale_remaining'] - $i->purchase->amount;
            }
        }
        $data = [
            'event' => $event,
            'payments' => $items,
            'details' => $details,
        ];
        return view('exports.purchasers', [
            'data' => $data
        ]);
    }
}
