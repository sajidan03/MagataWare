<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $guarded = [];

    public function categorie(){
        return $this->belongsTo(Categorie::class, 'categories_id');
    }

    public function cart(){
        return $this->hasMany(Cart::class, 'products_id');
    }
}
