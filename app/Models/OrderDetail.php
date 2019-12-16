<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model 
{

    protected $table = 'order_details';
    public $timestamps = true;
    protected $fillable = array('order_id', 'product_id', 'product_name', 'product_price', 'product_sales_quantity');

    public function order()
    {
        return $this->belongsTo('App\Models\Order');
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

}