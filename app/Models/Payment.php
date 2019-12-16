<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model 
{

    protected $table = 'payments';
    public $timestamps = false;
    protected $fillable = array('payment_method', 'payment_status');

    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }

}