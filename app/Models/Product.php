<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function store(){
        return $this->belongsTo('App\Models\Store');
    }

    public function purchase_transaction(){
        return $this->hasMany('App\Models\PurchaseTransaction');
    }
}
