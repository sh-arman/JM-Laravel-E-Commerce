<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['title',
                           'slug',
                           'category_id',
                           'sub_category_id',
                           'brand_id',
                           'image',
                           'description',
                           'price',
                           'quantity',
                           'status'];

    public function Category(){
      return $this->belongsTo('App\Category');
    }

    public function brand(){
      return $this->belongsTo('App\Brand');
    }

    public function images(){
      return $this->hasMany('App\ProductImage');
    }
}
                                                                                                                                                                                                                                                                                                               
