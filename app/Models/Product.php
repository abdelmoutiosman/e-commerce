<?php

namespace App\Models;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use Searchable;
    protected $table = 'products';
    public $timestamps = true;
    protected $fillable = array('category_id', 'manufacture_id', 'product_name', 'short_description', 'long_description', 'price', 'image', 'size', 'color', 'publication_status');

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function manufacture()
    {
        return $this->belongsTo('App\Models\Manufacture');
    }

    public function orderDetails()
    {
        return $this->hasMany('App\Models\OrderDetail');
    }
    public function reviews()
    {
        return $this->hasMany('App\Models\Review');
    }

}
