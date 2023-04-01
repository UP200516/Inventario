<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AluminumProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'color',
        'size',
        'thickness',
        'price_per_meter',
        'price',
    ];
}
