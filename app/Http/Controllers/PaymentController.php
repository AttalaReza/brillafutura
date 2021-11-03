<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Purchase;
use App\Models\Rental;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function notification(Request $request)
    {
        $payload = $request->getContent();
        $notification = json_decode($payload);

        // return response jika signature key invalid
        // $valid_signature_key = hash("sha512", $notification->order_id . $notification->status_code . $notification->gross_amount . env('MIDTRANS_SERVER_KEY'));
        // if ($notification->signature_key != $valid_signature_key) {
        //     return response(['message' => 'invalid signature'], 403);
        // }

        // return response jika status order sudah 'paid'
        $temp = explode('/', $notification->order_id);
        if ($temp[0] == 'TIC') return $this->purchaseNotification($notification);
        if ($temp[0] == 'REN') return $this->rentalNotification($notification);
    }

    private function purchaseNotification($notification)
    {
        date_default_timezone_set('Asia/Jakarta');
        $purchase = Purchase::whereIn('order_id', [$notification->order_id])->get()->first();
        if ($purchase->status == 'paid') {
            return response(['message' => 'the order has been paid before'], 422);
        }

        $this->initPaymentGateway();
        $payment_status = null;
        $transaction = $notification->transaction_status;
        $type = $notification->payment_type;
        $order_id = $notification->order_id;
        $fraud = $notification->fraud_status;

        if ($transaction == 'capture') {
            // For credit card transaction, we need to check whether transaction is challenge by FDS or not
            if ($type == 'credit_card') {
                if ($fraud == 'challenge') {
                    // TODO set payment status in merchant's database to 'Challenge by FDS'
                    // TODO merchant should decide whether this transaction is authorized or not in MAP
                    $payment_status = 'challenge';
                } else {
                    // TODO set payment status in merchant's database to 'Success'
                    $payment_status = 'success';
                }
            }
        } else if ($transaction == 'settlement') {
            // TODO set payment status in merchant's database to 'Settlement'
            $payment_status = 'settlement';
        } else if ($transaction == 'pending') {
            // TODO set payment status in merchant's database to 'Pending'
            $payment_status = 'pending';
        } else if ($transaction == 'deny') {
            // TODO set payment status in merchant's database to 'Denied'
            $payment_status = 'denied';
        } else if ($transaction == 'expire') {
            // TODO set payment status in merchant's database to 'Expire'
            $payment_status = 'expire';
        } else if ($transaction == 'cancel') {
            // TODO set payment status in merchant's database to 'Denied'
            $payment_status = 'denied';
        }

        $temp = explode('/', $order_id);
        $user_id = $temp[1];
        $purchase_id = $temp[2];

        $payment_params = [
            'user_id' => $user_id,
            'purchase_id' => $purchase_id,
            'code' => 'ticket',
            'type' => $type,
            'status' => $payment_status
        ];
        Payment::create($payment_params);

        // update data di table purchase
        if ($payment_status == 'success' || $payment_status == 'settlement') {
            $initial_event = strtoupper(substr($purchase->event->name, 0, 1) . substr($purchase->event->name, 1, 1) . substr($purchase->event->name, 2, 1));
            $ticket_info = '';
            if ($purchase->ticket == 'Presale 1') $ticket_info = 'P1' . $purchase->amount;
            if ($purchase->ticket == 'Presale 2') $ticket_info = 'P2' . $purchase->amount;
            if ($purchase->ticket == 'Onsale') $ticket_info = 'OS' . $purchase->amount;
            $code = 'TIC' . $initial_event . '-' . $user_id . '-' . $purchase_id . '-' . $ticket_info . '-TEST';
            Purchase::where('id', $purchase_id)->update([
                'code' => $code,
                'status' => 'paid',
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }
        return response(['message' => 'payment status is ' . $payment_status], 200);
    }

    private function rentalNotification($notification)
    {
        date_default_timezone_set('Asia/Jakarta');
        $rental = Rental::whereIn('order_id', [$notification->order_id])->get()->first();
        if ($rental->status == 'lunas' || $rental->status == 'dp') {
            return response(['message' => 'the order has been paid before'], 422);
        }

        $this->initPaymentGateway();
        $payment_status = null;
        $transaction = $notification->transaction_status;
        $type = $notification->payment_type;
        $order_id = $notification->order_id;
        $fraud = $notification->fraud_status;

        if ($transaction == 'capture') {
            // For credit card transaction, we need to check whether transaction is challenge by FDS or not
            if ($type == 'credit_card') {
                if ($fraud == 'challenge') {
                    // TODO set payment status in merchant's database to 'Challenge by FDS'
                    // TODO merchant should decide whether this transaction is authorized or not in MAP
                    $payment_status = 'challenge';
                } else {
                    // TODO set payment status in merchant's database to 'Success'
                    $payment_status = 'success';
                }
            }
        } else if ($transaction == 'settlement') {
            // TODO set payment status in merchant's database to 'Settlement'
            $payment_status = 'settlement';
        } else if ($transaction == 'pending') {
            // TODO set payment status in merchant's database to 'Pending'
            $payment_status = 'pending';
        } else if ($transaction == 'deny') {
            // TODO set payment status in merchant's database to 'Denied'
            $payment_status = 'denied';
        } else if ($transaction == 'expire') {
            // TODO set payment status in merchant's database to 'Expire'
            $payment_status = 'expire';
        } else if ($transaction == 'cancel') {
            // TODO set payment status in merchant's database to 'Denied'
            $payment_status = 'denied';
        }

        $temp = explode('/', $order_id);
        $user_id = $temp[1];
        $rental_id = $temp[2];
        $rental_status = strtolower($temp[3]);

        $payment_params = [
            'user_id' => $user_id,
            'rental_id' => $rental_id,
            'code' => 'rental',
            'type' => $type,
            'status' => $payment_status
        ];
        Payment::create($payment_params);

        // update data di table rental
        if ($payment_status == 'success' || $payment_status == 'settlement') {
            Rental::where('id', $rental_id)->update([
                'status' => $rental_status,
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }
        return response(['message' => 'payment status is ' . $payment_status], 200);
    }

    public function completed(Request $request)
    {
        return redirect()
            ->route('profile.history')
            ->with('success', 'pembayaran telah berhasil');
    }

    public function unfinish(Request $request)
    {
        return redirect()
            ->route('landing')
            ->with('failed', 'pembayaran dibatalkan');
    }

    public function failed(Request $request)
    {
        return redirect()
            ->route('landing')
            ->with('failed', 'pembayaran gagal, cobalah beberapa saat lagi');
    }
}
