<?php

namespace App\Http\Controllers;

use App\Exports\InvoicesExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

use App\Models\User;
use App\Models\Purchase;
use App\Models\Rental;
use App\Models\Payment;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // menampilkan data user
    public function index(Auth $auth)
    {
        $user = $auth::user();
        $data = [
            'user' => $user,
        ];
        return view('landing.profile.index', compact('data'));
    }

    // mengubah data user
    public function update(Request $request, Auth $auth, $id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $current_user = $auth::user();
        if ($current_user->id != $id) {
            return redirect()
                ->route('profile.index')
                ->with('failed', 'Profile gagal terupdate.');
        }
        $user = User::find($id);
        $users = User::all()->where('id', '!=', $id);
        $name = $request->input('name');
        foreach ($users as $u) {
            if ($u->name == $name) {
                return redirect()
                    ->route('profile.index')
                    ->with('failed', 'Mohon maaf, nama ' . $name . ' telah terpakai. Gantilah dengan nama yang lainnya.');
            }
        }
        $user->update($request->all());
        return redirect()
            ->route('profile.index')
            ->with('success', 'Profile anda berhasil diupdate.');
    }

    public function showHistory(Auth $auth)
    {
        $user = $auth::user();
        $payments = Payment::where('user_id', $user->id)->orderBy('created_at', 'DESC')->get();
        $purchases = [];
        $rentals = [];
        foreach ($payments as $payment) {
            $payment = $this->_setCreated($payment);
            $payment->key = md5('invoice-'.$payment->id.'-brilla-futura');
            if ($payment->code === "ticket") {
                $payment->purchase->event = $this->_setDay($payment->purchase->event);
                $payment->purchase->event = $this->_setDate($payment->purchase->event);
                $payment->purchase->price = number_format($payment->purchase->ticket_price);
                $payment->purchase->total = number_format($payment->purchase->payment_amount);
                if ($payment->purchase->ticket === "presale_1") $payment->purchase->ticket = "Presale 1";
                if ($payment->purchase->ticket === "presale_2") $payment->purchase->ticket = "Presale 2";
                if ($payment->purchase->ticket === "onsale") $payment->purchase->ticket = "Onsale";
                array_push($purchases, $payment);
            }
            if ($payment->code === "rental") {
                $payment->rental = $this->_setDay($payment->rental);
                $payment->rental = $this->_setDate($payment->rental);
                $payment->rental->price = number_format($payment->rental->tool->price);
                $payment->rental->total = number_format($payment->rental->payment_amount);
                array_push($rentals, $payment);
            }
        }
        $data = [
            'purchases' => $purchases,
            'rentals' => $rentals,
            'user' => $user
        ];
        // dd($data);
        return view('landing.profile.history', compact('data'));
    }
    public function deleteHistory(Auth $auth, $id)
    {
        $current_user = $auth::user();
        $payment = Payment::where('id', $id)->update([
            'code' => 'deleted',
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        return redirect()
            ->route('profile.history')
            ->with('success', 'Pesanan berhasil dihapus.');
    }

    function invoicesExport($id, $key)
    {
        $payment = Payment::find($id);
        $check = md5('invoice-'.$payment->id.'-brilla-futura');
        if ($key == $check) {
            $invoice = $payment->invoice;
            if ($payment->code === "ticket") {
                if ($payment->purchase->ticket === "presale_1") $payment->purchase->ticket = "Presale 1";
                if ($payment->purchase->ticket === "presale_2") $payment->purchase->ticket = "Presale 2";
                if ($payment->purchase->ticket === "onsale") $payment->purchase->ticket = "Onsale";
                $payment->desc = 'Ticket '.$payment->purchase->ticket.' '.$payment->purchase->event->name;
                $payment->location = $payment->purchase->event->location;
                $payment->schedule = $this->_setDay($payment->purchase->event)->day.', '.$this->_setDate($payment->purchase->event)->date;

                $payment->qty = $payment->purchase->amount. ' tiket';
                $payment->price = number_format($payment->purchase->ticket_price);
                $payment->total = number_format($payment->purchase->payment_amount);
                $payment->last_total = ($payment->purchase->payment_amount);
                $payment->code = $payment->purchase->code;
                $payment->payment_status = 'LUNAS';
                $payment->tnc = 'Silakan tukarkan Kode Tiket Anda pada tempat dan waktu Event akan berlangsung.';
            }
            if ($payment->code === "rental") {
                $payment->desc = $payment->rental->tool->name;
                $payment->location = $payment->rental->location;
                $payment->schedule = $this->_setDay($payment->rental)->day.', '.$this->_setDate($payment->rental)->date;

                $payment->qty = $payment->rental->duration. ' hari';
                $payment->price = number_format($payment->rental->tool->price);
                $payment->total = number_format($payment->rental->tool->price * $payment->rental->duration);
                $payment->last_total = ($payment->rental->tool->price * $payment->rental->duration);
                $payment->code = '';
                $payment->payment_status = $payment->rental->status;
                $payment->tnc = '';
            }

            $data = [
                'customer' => $payment->user,
                'no_invoice' => $invoice,
                'date' => date("d/m/Y", strtotime($payment->created_at)),
                'payment' => $payment,
            ];
            // dd($data);
            return view('exports.invoice', compact('data'));
            // view()->share('data',$data);
            // $pdf = PDF::loadView('exports.invoice', $data);

            // // download PDF file with download method
            // return $pdf->download('pdf_file.pdf');
        }
        abort(404);
    }

    function invoicesDownload($id, $key)
    {
        $payment = Payment::find($id);
        $check = md5('invoice-'.$payment->id.'-brilla-futura');
        if ($key == $check) {
            // return Excel::download(new InvoicesExport($id), 'invoice.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
            $data = [
                'id' => $id,
                'key' => $key,
            ];
            $pdf = app('dompdf.wrapper')->loadView('exports.invoice', compact('data'));
            return $pdf->download('invoice.pdf');
            // view()->share('data',$data);
            // $pdf = PDF::loadView('exports.invoice', $data);

            // // download PDF file with download method
            // return $pdf->download('pdf_file.pdf');
        }
        abort(404);
    }


    private function _setCreated($data)
    {
        $days = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu"];
        $data->created_time = date("H:i", strtotime($data->created_at));
        $data->created_day = $days[date("w", strtotime($data->created_at))];
        $data->created = date("j M Y", strtotime($data->created_at));
        return $data;
    }
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
}
