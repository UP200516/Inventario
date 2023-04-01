<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'manager_name',
        'address',
        'zip_code',
        'city',
        'state',
        'rfc',
        'email',
        'phone',
    ];
}
