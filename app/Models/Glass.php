<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Glass extends Model
{
    use HasFactory;

    protected $fillable = [
        'color',
        'size',
        'thickness',
        'price_per_meter',
        'price',
    ];
}
