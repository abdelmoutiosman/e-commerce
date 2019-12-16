<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model 
{

    protected $table = 'orders';
    public $timestamps = false;
    protected $fillable = array('customer_id', 'shipping_id', 'payment_id', 'order_total', 'order_status');

    public function orderDetails()
    {
        return $this->hasMany('App\Models\OrderDetail');
    }

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }

    public function payment()
    {
        return $this->belongsTo('App\Models\Payment');
    }

    public function shipping()
    {
        return $this->belongsTo('App\Models\Shipping');
    }

}