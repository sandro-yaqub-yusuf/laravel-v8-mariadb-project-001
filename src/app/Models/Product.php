<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'image',
        'quantity',
        'cost_price',
        'sales_price',
        'status'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
