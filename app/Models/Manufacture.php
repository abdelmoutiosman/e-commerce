<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manufacture extends Model
{

    protected $table = 'manufactures';
    public $timestamps = true;
    protected $fillable = array('manufacture_name', 'manufacture_description', 'publication_status');

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }

}
