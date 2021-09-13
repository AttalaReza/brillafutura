<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table = 'payments';
    protected $fillable = [
        'user_id',
        'purchase_id',
        'rental_id',
        'type',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function purchase()
    {
        return $this->belongsTo('App\Models\Purchase');
    }
    public function rental()
    {
        return $this->belongsTo('App\Models\Rental');
    }
}
