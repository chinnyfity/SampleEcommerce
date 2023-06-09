<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyCart extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice',
        'user',
        'product',
        'qty',
        'price',
        'total',
        'payment_type',
        'paid',
    ];
}
