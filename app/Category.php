<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['title', 'description','parent_id' , 'image'];

    public function parent(){
      return $this->belongsTo(Category::class, 'parent_id');
    }

    public function Products(){
      return $this->hasMany('App\Product');
    }
}
