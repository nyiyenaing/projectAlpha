<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orderdetails extends Model
{
    protected $fillable = [
        'user_id' , 'product_id' , 'unit_price' , 'status' , 'qty' ,
        'total' , 'order_no'
    ];
}
