<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rabbitgoo extends Model
{
    use HasFactory;

    protected $fillable = [
        'color',
        'figure',
        'price_per_meter',
        'price',
    ];
}
