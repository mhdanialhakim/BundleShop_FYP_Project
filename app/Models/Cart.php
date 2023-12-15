<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'cart';
    protected $primaryKey = 'cartid';
    protected $fillable = [
        'product_id', 
        'user_id',
        'user_name', 
        'user_address',
        'user_pnumber',
        'user_email', 
        'product_name', 
        'product_price', 
        'product_image', 
        'product_brand',
        'product_color',
        'product_category',
        'product_grade',
        'product_size'
    ];

}
