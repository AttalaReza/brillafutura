<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;
    protected $table = 'rentals';
    protected $fillable = [
        'user_id',
        'tool_id',
        'start_date',
        'end_date',
        'duration',
        'location',
        'payment_amount',
        'repayment',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function tool()
    {
        return $this->belongsTo('App\Models\Tool');
    }

    public function payment()
    {
        return $this->hasMany('App\Models\Payment');
    }
}
