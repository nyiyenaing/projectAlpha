<?php

namespace App\Http\Controllers;

use App\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function show(){
        $orders = Users::all();

        //$item = DB::select("select * from where orderdetails.user_id = $user_id");
        return view('orderList' , compact('orders'));
    }

    public function statusUpdate($id){
        $user  = Users::find($id);

        if ($user->status == 0 ){
            $user->status = 1;
            $user->save();
        }
        else{
            $user->status = 0;
            $user->save();
        }
        return redirect('/order/orderList');

    }
}
