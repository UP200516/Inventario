<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vinyl extends Model
{
    use HasFactory;

    protected $fillable = [
        'color',
        'thickness',
        'price_per_kilo',
        'price',
    ];

}
