<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Polycarbonate extends Model
{
    use HasFactory;

    protected $fillable = [
        'color',
        'size',
        'price_per_meter',
        'price',
    ];
}
