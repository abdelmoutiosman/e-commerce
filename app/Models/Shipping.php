<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{

    protected $table = 'shippings';
    public $timestamps = true;
    protected $fillable = array('first_name', 'last_name', 'address', 'mobile', 'email', 'city');

    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }

}
