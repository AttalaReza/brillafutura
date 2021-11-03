<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Purchase;
use App\Models\Tool;
use App\Models\Rental;
use App\Models\Payment;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Auth $auth)
    {
        $user = $auth::user();
        $data = [
            'user' => $user
        ];
        return view('landing.index', compact('data'));
    }

    public function showEvents(Auth $auth)
    {
        $user = $auth::user();
        $events = Event::orderBy('created_at', 'ASC')->get();
        foreach ($events as $event) {
            $event = $this->_setDay($event);
            $event = $this->_setDate($event);
        }
        $data = [
            'events' => $events,
            'user' => $user
        ];
        return view('landing.events.index', compact('data'));
    }
    public function showOneEvent(Auth $auth, $slug)
    {
        $user = $auth::user();
        $event = Event::whereIn('slug', [$slug])->firstOrFail();
        $purchase_id = [];
        foreach ($event->purchase as $p) {
            array_push($purchase_id, $p->id);
        }
        $payments = Payment::whereIn('purchase_id', $purchase_id)
            ->whereIn('status', ['success', 'settlement'])
            ->get();
        $event->description = explode(' ', $event->description);
        $event = $this->_setDay($event);
        $event = $this->_setDate($event);
        $event = $this->_setFormatPresale1($event, $payments);
        $event = $this->_setFormatPresale2($event, $payments);
        $event = $this->_setFormatOnsale($event, $payments);
        $data = [
            'event' => $event,
            'user' => $user
        ];
        return view('landing.events.show', compact('data'));
    }
    public function ticketCheckout(Auth $auth, $slug, Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $user = $auth::user();
        $event = Event::whereIn('slug', [$slug])->firstOrFail();
        $ticket = $request->get('ticket');
        $price = 0;
        if ($ticket == "Presale 1") $price = $event->presale_1;
        if ($ticket == "Presale 2") $price = $event->presale_2;
        if ($ticket == "Onsale") $price = $event->onsale;
        $amount = (int)$request->input('amount');
        $payment_amount = $amount * $price;
        // $item = [
        //     'user_id' => $user->id,
        //     'event_id' => $event->id,
        //     'ticket' => $ticket,
        //     'amount' => $amount,
        //     'ticket_price' => $price,
        //     'payment_amount' => $payment_amount,
        //     'status' => 'unpaid',
        //     'created_at' => date('Y-m-d H:i:s'),
        //     'updated_at' => date('Y-m-d H:i:s'),
        // ];
        // dd($item);

        $purchase_id = Purchase::insertGetId([
            'user_id' => $user->id,
            'event_id' => $event->id,
            'ticket' => $ticket,
            'amount' => $amount,
            'ticket_price' => $price,
            'payment_amount' => $payment_amount,
            'status' => 'unpaid',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        $order_id = 'TIC/' . $user->id . '/' . $purchase_id . '/' . $payment_amount . '/STAGING';

        // set payment midtrans snap-redirect
        $this->initPaymentGateway();

        $customer_details = [
            'first_name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone,
            'billing_address' => [
                'first_name' => $user->name,
                'email' => $user->email,
                'phone' => $user->phone,
                'address' => $user->address,
            ],
            'shipping_address' => [
                'first_name' => $user->name,
                'email' => $user->email,
                'phone' => $user->phone,
                'address' => $user->address,
            ],
        ];
        $item_details = [
            [
                'id' => $purchase_id,
                'price' => $price,
                'quantity' => $amount,
                'name' => $event->name . ': Tiket ' . $ticket,
                'category' => $ticket,
            ]
        ];
        $params = [
            'transaction_details' => [
                'order_id' => $order_id,
                'gross_amount' => $payment_amount
            ],
            'item_details' => $item_details,
            'customer_details' => $customer_details,
            'enable_payment' => Payment::PAYMENT_CHANNELS,
            'expiry' => [
                'start_time' => date('Y-m-d H:i:s T'),
                'unit' => 'days',
                'duration' => '7'
            ]
        ];

        // Get Snap Payment Page URL
        $snap = \Midtrans\Snap::createTransaction($params);
        if ($snap->token) {
            $payment_token = $snap->token;
            $redirect_url = $snap->redirect_url;
        }

        // update tabel
        Purchase::where('id', $purchase_id)->update([
            'order_id' => $order_id,
            'payment_token' => $payment_token,
            'redirect_url' => $redirect_url,
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect($redirect_url);
    }

    public function showRentals(Auth $auth)
    {
        $user = $auth::user();
        $tools = Tool::orderBy('created_at', 'ASC')->get();
        foreach ($tools as $tool) {
            $tool->cost = number_format($tool->price);
        }
        $data = [
            'tools' => $tools,
            'user' => $user
        ];
        return view('landing.rentals.index', compact('data'));
    }
    public function showOneRental(Auth $auth, $slug)
    {
        $user = $auth::user();
        $tool = Tool::whereIn('slug', [$slug])->firstOrFail();
        $tool->description = explode(' ', $tool->description);
        $tool->cost = number_format($tool->price);
        $data = [
            'tool' => $tool,
            'user' => $user
        ];
        return view('landing.rentals.show', compact('data'));
    }
    public function rentalCheckout(Auth $auth, $slug, Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $user = $auth::user();
        $tool = Tool::whereIn('slug', [$slug])->firstOrFail();
        $price = (int)$tool->price;
        $num = ['Jan' => '01', 'Feb' => '02', 'Mar' => '03', 'Apr' => '04', 'May' => '05', 'Jun' => '06', 'Jul' => '07', 'Aug' => '08', 'Sep' => '09', 'Oct' => '10', 'Nov' => '11', 'Dec' => '12'];
        $temp = explode('-', $request->input('end_date'));
        $start_date = $request->input('start_date');
        $end_date = $temp[2] . "-" . $num[$temp[1]] . "-" . $temp[0];
        $duration = (int)$request->input('duration');
        $location = $request->input('location');
        $payment_amount = (int)$request->input('duration') * $tool->price;
        $status = strtoupper($request->input('status'));

        $rental_id = Rental::insertGetId([
            'user_id' => $user->id,
            'tool_id' => $tool->id,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'duration' => $duration,
            'location' => $location,
            'payment_amount' => $payment_amount,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        $order_id = 'REN/' . $user->id . '/' . $rental_id . '/' . $status . '/STAGING';

        // set payment midtrans snap-redirect
        $this->initPaymentGateway();

        $customer_details = [
            'first_name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone,
            'billing_address' => [
                'first_name' => $user->name,
                'email' => $user->email,
                'phone' => $user->phone,
                'address' => $user->address,
            ],
            'shipping_address' => [
                'first_name' => $user->name,
                'email' => $user->email,
                'phone' => $user->phone,
                'address' => $location,
            ],
        ];
        $item_details = [
            [
                'id' => $rental_id,
                'price' => $price,
                'quantity' => $duration,
                'name' => $tool->name,
                'category' => $tool->type,
            ]
        ];
        $params = [
            'transaction_details' => [
                'order_id' => $order_id,
                'gross_amount' => $payment_amount
            ],
            'item_details' => $item_details,
            'customer_details' => $customer_details,
            'enable_payment' => Payment::PAYMENT_CHANNELS,
            'expiry' => [
                'start_time' => date('Y-m-d H:i:s T'),
                'unit' => 'days',
                'duration' => '7'
            ]
        ];
        // dd($params);
        // Get Snap Payment Page URL
        $snap = \Midtrans\Snap::createTransaction($params);
        if ($snap->token) {
            $payment_token = $snap->token;
            $redirect_url = $snap->redirect_url;
        }

        // update tabel
        Rental::where('id', $rental_id)->update([
            'order_id' => $order_id,
            'payment_token' => $payment_token,
            'redirect_url' => $redirect_url,
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect($redirect_url);
    }


    // private function
    private function _setDay($data)
    {
        $days = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu"];
        $days_eng = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
        if ($data->end_date) {
            if ($data->start_date === $data->end_date) {
                $data->day = $days[date("w", strtotime($data->start_date))];
            } else {
                $data->day = $days[date("w", strtotime($data->start_date))] . "-" . $days[date("w", strtotime($data->end_date))];
            }
        } else {
            $data->day = $days[date("w", strtotime($data->start_date))];
        }
        return $data;
    }
    private function _setDate($data)
    {
        if ($data->end_date) {
            if ($data->start_date === $data->end_date) {
                $data->date = date("j M Y", strtotime($data->start_date));
            } else {
                $data->date = date("j", strtotime($data->start_date)) . "-" . date("j M Y", strtotime($data->end_date));
            }
        } else {
            $data->date = date("j M Y", strtotime($data->start_date));
        }
        return $data;
    }
    private function _setFormatPresale1($data, $payments)
    {
        $data->presale_1_status = "open";
        $data->presale_1_price = number_format($data->presale_1);
        $data->presale_1_ticket_info = "Tickets Available!";
        $now = date("Y-m-d");

        foreach ($payments as $p) {
            if ($p->purchase->ticket === "Presale 1") {
                $data->presale_1_ticket -= $p->purchase->amount;
            }
        }
        if ($data->presale_1_ticket === 0) {
            $data->presale_1_ticket_info = "Tickets Sold Out!";
            $data->presale_1_status = "close";
            $data->presale_1_date = "Expiry";
            return $data;
        }

        if ($data->presale_1_start === null && $data->presale_1_end === null) {
            $data->presale_1_price = "-";
            $data->presale_1_ticket_info = null;
            $data->presale_1_date = "No Open";
            $data->presale_1_status = "close";
            return $data;
        }
        if ($now < $data->presale_1_start) {
            $data->presale_1_price = "-";
            $data->presale_1_ticket_info = "Coming Soon";
            $data->presale_1_date = date("j M Y", strtotime($data->presale_1_start));
            $data->presale_1_status = "close";
        } else if ($data->presale_1_end < $now) {
            $data->presale_1_ticket_info = "Tickets Sold Out!";
            $data->presale_1_date = "Expiry";
            $data->presale_1_status = "close";
        } else {
            if ($data->presale_1_end) {
                if ($data->presale_1_start === $data->presale_1_end) {
                    $data->presale_1_date = date("j M Y", strtotime($data->presale_1_start));
                } else {
                    $data->presale_1_date = date("j", strtotime($data->presale_1_start)) . "-" . date("j M Y", strtotime($data->presale_1_end));
                }
            } else {
                $data->presale_1_date = date("j M Y", strtotime($data->presale_1_start));
            }
        }
        return $data;
    }
    private function _setFormatPresale2($data, $payments)
    {
        $data->presale_2_status = "open";
        $data->presale_2_price = number_format($data->presale_2);
        $data->presale_2_ticket_info = "Tickets Available!";
        $now = date("Y-m-d");

        foreach ($payments as $p) {
            if ($p->purchase->ticket === "Presale 2") {
                $data->presale_2_ticket -= $p->purchase->amount;
            }
        }
        if ($data->presale_2_ticket === 0) {
            $data->presale_2_ticket_info = "Tickets Sold Out!";
            $data->presale_2_status = "close";
            $data->presale_2_date = "Expiry";
            return $data;
        }

        if ($data->presale_2_start === null && $data->presale_2_end === null) {
            $data->presale_2_price = "-";
            $data->presale_2_ticket_info = null;
            $data->presale_2_date = "No Open";
            $data->presale_2_status = "close";
            return $data;
        }
        if ($now < $data->presale_2_start) {
            $data->presale_2_price = "-";
            $data->presale_2_ticket_info = "Coming Soon";
            $data->presale_2_date = date("j M Y", strtotime($data->presale_2_start));
            $data->presale_2_status = "close";
        } else if ($data->presale_2_end < $now) {
            $data->presale_2_ticket_info = "Tickets Sold Out!";
            $data->presale_2_date = "Expiry";
            $data->presale_2_status = "close";
        } else {
            if ($data->presale_2_end) {
                if ($data->presale_2_start === $data->presale_2_end) {
                    $data->presale_2_date = date("j M Y", strtotime($data->presale_2_start));
                } else {
                    $data->presale_2_date = date("j", strtotime($data->presale_2_start)) . "-" . date("j M Y", strtotime($data->presale_2_end));
                }
            } else {
                $data->presale_2_date = date("j M Y", strtotime($data->presale_2_start));
            }
        }
        return $data;
    }
    private function _setFormatOnsale($data, $payments)
    {
        $data->onsale_status = "open";
        $data->onsale_price = number_format($data->onsale);
        $data->onsale_ticket_info = "Tickets Available!";
        $now = date("Y-m-d");

        foreach ($payments as $p) {
            if ($p->purchase->ticket === "Onsale") {
                $data->onsale_ticket -= $p->purchase->amount;
            }
        }
        if ($data->onsale_ticket === 0) {
            $data->onsale_ticket_info = "Tickets Sold Out!";
            $data->onsale_status = "close";
            $data->onsale_date = "Expiry";
            return $data;
        }

        if ($data->onsale_start === null || $data->onsale_end === null) {
            $data->onsale_price = "-";
            $data->onsale_ticket_info = null;
            $data->onsale_date = "No Open";
            $data->onsale_status = "close";
            return $data;
        }
        if ($now < $data->onsale_start) {
            $data->onsale_price = "-";
            $data->onsale_ticket_info = "Coming Soon";
            $data->onsale_date = date("j M Y", strtotime($data->onsale_start));
            $data->onsale_status = "close";
        } else if ($data->onsale_end < $now) {
            $data->onsale_ticket_info = "Tickets Sold Out!";
            $data->onsale_date = "Expiry";
            $data->onsale_status = "close";
        } else {
            if ($data->onsale_end) {
                if ($data->onsale_start === $data->onsale_end) {
                    $data->onsale_date = date("j M Y", strtotime($data->onsale_start));
                } else {
                    $data->onsale_date = date("j", strtotime($data->onsale_start)) . "-" . date("j M Y", strtotime($data->onsale_end));
                }
            } else {
                $data->onsale_date = date("j M Y", strtotime($data->onsale_start));
            }
        }
        return $data;
    }
}
