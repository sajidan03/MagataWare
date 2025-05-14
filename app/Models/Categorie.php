<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    //
    protected $guarded = [];

    public function product(){
        return $this->hasMany(Product::class, 'categories_id');
    }
}
