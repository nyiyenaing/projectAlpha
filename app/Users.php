<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Users extends Authenticatable
{
    protected $fillable = [
        'name' , 'email' , 'password' , 'address' ,  'phone'  ,'status' , 'remember_token'];

}

