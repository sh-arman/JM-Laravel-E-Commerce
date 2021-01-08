<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
  protected $fillable = ['title', 'image', 'description'];
  
  public function Products(){
    return $this->hasMany('App\Product');
  }
}
