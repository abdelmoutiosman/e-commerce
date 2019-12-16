<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'categories';
    public $timestamps = true;
    protected $guarded=[];
    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
