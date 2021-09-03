<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $table = 'events';
    protected $fillable = [
        'name',
        'slug',
        'sponsor',
        'description',
        'presale_1',
        'presale_1_start',
        'presale_1_end',
        'presale_2',
        'presale_2_start',
        'presale_2_end',
        'onsale',
        'onsale_start',
        'onsale_end',
        'location',
        'start_date',
        'end_date',
        'file_image',
    ];

    public function purchase()
    {
        return $this->hasMany('App\Models\Purchase');
    }
}
