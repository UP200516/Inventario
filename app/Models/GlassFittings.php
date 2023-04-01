<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GlassFittings extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'color',
        'size',
        'thickness',
        'price',
    ];
}
