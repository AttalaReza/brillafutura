<?php

namespace App\Http\Controllers;

use App\Exports\PurchasersExport;
use App\Exports\RentalsExport;
use Maatwebsite\Excel\Facades\Excel;

use App\Models\Event;
use App\Models\Tool;
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
        if ($user->role == 0) {
            return redirect()->route('landing');
        }
        $events = Event::all();
        $tools = Tool::all();
        $data = [
            'user' => $user,
            'events' => $events->count(),
            'tools' => $tools->count(),
        ];
        return view('admin.index', compact('data'));
    }

    // menampilkan data tickets
    public function showTickets(Auth $auth)
    {
        $user = $auth::user();
        if ($user->role == 0) {
            return redirect()->route('home');
        }
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
        if ($user->role == 0) {
            return redirect()->route('home');
        }
        $event = Event::find($id);
        $purchase_id = [];
        foreach ($event->purchase as $p) {
            array_push($purchase_id, $p->id);
        }
        $payments = Payment::whereIn('purchase_id', $purchase_id)
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
            'presale_1_remaining' => $event->presale_1_ticket,
            'presale_2_remaining' => $event->presale_2_ticket,
            'onsale_remaining' => $event->onsale_ticket,
        ];
        $item = $payments;
        foreach ($item as $i) {
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
        $key = md5($event->name);
        $data = [
            'event' => $event,
            'payments' => $item,
            'details' => $details,
            'user' => $user,
            'key' => $key,
        ];
        // dd($data);
        return view('admin.tickets.purchasers', compact('data'));
    }

    // download excel
    public function purchasersExport($id, $key)
    {
        $event = Event::find($id);
        $check = md5($event->name);
        if ($key == $check) {
            return Excel::download(new PurchasersExport($id), 'Pembeli ' . $event->name . '.xlsx');
        }
        abort(404);
    }

    // menampilkan data rentals
    public function showRentals(Auth $auth)
    {
        $user = $auth::user();
        if ($user->role == 0) {
            return redirect()->route('home');
        }
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
        if ($user->role == 0) {
            return redirect()->route('home');
        }
        Rental::where('id', $id)->update([
            'status' => "lunas",
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->route('rentals.index')
            ->with('success', 'change status to LUNAS has been successful');
    }

    // download excel
    public function rentalsExport(Request $request)
    {
        $month = $request->input('month');
        $year = $request->input('year');
        if ($month == 0) {
            return redirect()->route('rentals.index')
                ->with('failed', 'Silahkan pilih Bulan terlebih dahulu');
        }
        if (strlen($year) == 4) {
            if ($month == 13) {
                $month = 0;
            }
            return Excel::download(new RentalsExport($month, $year), 'Penyewa-' . $month . '-' . $year . '.xlsx');
        }
        return redirect()->route('rentals.index')
            ->with('failed', 'Tahun minimal 4 angka');
    }
}
