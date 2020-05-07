<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'name_bn', 'price', 'stock_qty', 'rating', 'rating_by', 'sale_price', 'product_code',
        'variation_type', 'image', 'description', 'description_bn', 'short_description', 'short_description_bn',
        'catagory_id', 'measurment_unit_id', 'seller_id'
    ];

}
