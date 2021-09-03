<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
    use HasFactory;
    protected $table = 'tools';
    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'file_image',
    ];

    public function rental()
    {
        return $this->hasMany('App\Models\Rental');
    }
}
