<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category',
        'title',
        'price',
        'description',
        'qty',
        'canvas_width',
        'canvas_height',
        'file1',
        'file2',
        'file3',
        'views',
    ];
}
