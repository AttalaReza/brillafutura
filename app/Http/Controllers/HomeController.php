<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Tool;
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
        foreach ($events as $event) $event = $this->_setDate($event);
        $data = [
            'events' => $events,
            'user' => $user
        ];
        return view('landing.events.index', compact('data'));
    }
    public function showOneEvent(Auth $auth, $slug)
    {
        $user = $auth::user();
        $event = Event::whereIn('slug', [$slug])->get()->first();
        $purchase_id = [];
        foreach ($event->purchase as $p) {
            array_push($purchase_id, $p->id);
        }
        $payments = Payment::whereIn('purchase_id', $purchase_id)
            ->whereIn('status', ['success', 'settlement'])
            ->get();
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
    public function checkout(Auth $auth, Request $request)
    {
        dd($request->all());
    }

    public function showRentals(Auth $auth)
    {
        $user = $auth::user();
        $tools = Tool::orderBy('created_at', 'ASC')->get();
        $data = [
            'tools' => $tools,
            'user' => $user
        ];
        return view('landing.rentals.index', compact('data'));
    }
    public function showOneRental(Auth $auth, $id)
    {

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
        $now = date("Y-m-d");

        foreach ($payments as $p) {
            if ($p->purchase->ticket === "presale_1") {
                $data->presale_1_ticket -= $p->purchase->amount;
            }
        }
        if ($data->presale_1_ticket === 0) {
            $data->presale_1_ticket_info = "Tickets Sold Out!";
            $data->presale_1_status = "close";
            $data->presale_1_date = "Expiry";
            return $data;
        }
        else if ($data->presale_1_ticket > 1) $data->presale_1_ticket_info = $data->presale_1_ticket . " Tickets Left";
        else $data->presale_1_ticket_info = "Only " . $data->presale_1_ticket . " Ticket Left";

        if ($data->presale_1_start === null && $data->presale_1_end === null) {
            $data->presale_1_price = "-";
            $data->presale_1_ticket_info = null;
            $data->presale_1_date = "Closed";
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
        $now = date("Y-m-d");

        foreach ($payments as $p) {
            if ($p->purchase->ticket === "presale_2") {
                $data->presale_2_ticket -= $p->purchase->amount;
            }
        }
        if ($data->presale_2_ticket === 0) {
            $data->presale_2_ticket_info = "Tickets Sold Out!";
            $data->presale_2_status= "close";
            $data->presale_2_date = "Expiry";
            return $data;
        }
        else if ($data->presale_2_ticket > 1) $data->presale_2_ticket_info = $data->presale_2_ticket . " Tickets Left";
        else $data->presale_2_ticket_info = "Only " . $data->presale_2_ticket . " Ticket Left";

        if ($data->presale_2_start === null && $data->presale_2_end === null) {
            $data->presale_2_price = "-";
            $data->presale_2_ticket_info = null;
            $data->presale_2_date = "Closed";
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
        $now = date("Y-m-d");

        foreach ($payments as $p) {
            if ($p->purchase->ticket === "onsale") {
                $data->onsale_ticket -= $p->purchase->amount;
            }
        }
        if ($data->onsale_ticket === 0) {
            $data->onsale_ticket_info = "Tickets Sold Out!";
            $data->onsale_status = "close";
            $data->onsale_date = "Expiry";
            return $data;
        }
        else if ($data->onsale_ticket > 1) $data->onsale_ticket_info = $data->onsale_ticket . " Tickets Left";
        else $data->onsale_ticket_info = "Only " . $data->onsale_ticket . " Ticket Left";

        if ($data->onsale_start === null && $data->onsale_end === null) {
            $data->onsale_price = "-";
            $data->onsale_ticket_info = null;
            $data->onsale_date = "Closed";
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
