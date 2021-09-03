<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    protected $table = 'purchases';
    protected $fillable = [
        'user_id',
        'event_id',
        'ticket',
        'amount',
        'ticket_price',
        'payment_amount',
        'code',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function event()
    {
        return $this->belongsTo('App\Models\Event');
    }

    public function payment()
    {
        return $this->hasMany('App\Models\Payment');
    }
}
