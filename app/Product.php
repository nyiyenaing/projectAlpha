<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title',
        'description',
        'category_id',
        'imgs',
        'price'

    ];

    public function use(){
        return $this->hasOne('App\Categories');
    }
}
