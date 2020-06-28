<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    protected $fillable = [
        'user_id' , 'amount' , 'status' , 'order_no'
    ];
}
