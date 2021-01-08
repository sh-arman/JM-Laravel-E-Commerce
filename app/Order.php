<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $fillable = [
      'user_id',
      'method_id',
      'name',
      'transaction_id',
      'address',
      'city',
      'email',
      'phone_number',
      'note',
      'ip_address',
      'is_paid',
      'is_seen_by_admin',
      'is_on_processing',
      'is_completed',
    ];

    public function user(){
      return $this->belongsTo(User::class);
    }

    public function carts(){
      return $this->belongsTo(Cart::class);
    }
}
