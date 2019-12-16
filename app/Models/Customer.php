<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{

    protected $table = 'customers';
    public $timestamps = true;
    protected $fillable = array('customer_name', 'email_address', 'password', 'telephone','status');

    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }

}
