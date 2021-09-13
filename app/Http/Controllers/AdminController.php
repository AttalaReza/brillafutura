<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Ticket;
use App\Models\Rental;
use App\Models\Payment;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // menampilkan dashboard
    public function index(Auth $auth)
    {
        $user = $auth::user();
        // if ($user->role == 0) {
        //     return redirect()->route('dashboard');
        // }
        $data = [
            'user' => $user
        ];
        return view('admin.index', compact('data'));
    }

    // menampilkan data tickets
    public function showTickets(Auth $auth)
    {
        $user = $auth::user();
        // if ($user->role == 0) {
        //     return redirect()->route('home');
        // }
        $data = [
            'events' => Event::orderBy('created_at', 'ASC')->get(),
            'user' => $user
        ];
        return view('admin.tickets.index', compact('data'));
    }

    // menampilkan data tickets
    public function showPurchasers(Auth $auth, $id)
    {
        $user = $auth::user();
        // if ($user->role == 0) {
        //     return redirect()->route('home');
        // }
        $event = Event::find($id);
        $purchase_id = [];
        foreach ($event->purchase as $p) {
            array_push($purchase_id, $p->id);
        }
        $payments = Payment::whereIn('purchase_id', $purchase_id)
            ->whereIn('status', ['success', 'settlement'])
            ->orderBy('created_at', 'DESC')
            ->get();

        $data = [
            'event' => $event,
            'payments' => $payments,
            'user' => $user
        ];
        return view('admin.tickets.purchasers', compact('data'));
    }

    // menampilkan data rentals
    public function showRentals(Auth $auth)
    {
        $user = $auth::user();
        // if ($user->role == 0) {
        //     return redirect()->route('home');
        // }
        $rentals = Rental::all();
        $rental_id = [];
        foreach ($rentals as $rental) {
            array_push($rental_id, $rental->id);
        }
        $payments = Payment::whereIn('rental_id', $rental_id)
            ->whereIn('status', ['success', 'settlement'])
            ->orderBy('created_at', 'DESC')
            ->get();
        $data = [
            'user' => $user,
            'payments' => $payments,
        ];
        return view('admin.rentals', compact('data'));
    }

    // mengubah status data rental
    public function changeRentalStatus(Auth $auth, $id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $user = $auth::user();
        // if ($user->role == 0) {
        //     return redirect()->route('home');
        // }
        Rental::where('id', $id)->update([
            'status' => "lunas",
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->route('rentals.index')
            ->with('success', 'change status to LUNAS has been successful');
    }
}
