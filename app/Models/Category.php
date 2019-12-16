<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $table = 'categories';
    public $timestamps = true;
    protected $fillable = array('category_name', 'category_description', 'publication_status');

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }

}
