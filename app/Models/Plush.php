<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plush extends Model
{
    use HasFactory;

    protected $fillable = [
        'color',
        'type',
        'price_per_meter',
        'price',
    ];
}
