<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Orderdetails;
use App\Orders;
use App\Payments;
use App\Users;
use Illuminate\Http\Request;
use App\Product;
use mysql_xdevapi\Session;
use Stripe\Order;

class CartController extends Controller
{
    public function view(){
        return view('cart');

    }

    public function  addtoCart($id){

        $product = Product::find($id);
        $cart = session()->get('cart');

        // if cart is empty then this the first product
        if (!$cart) {
            $item = [
                $id => [

                    "title" => $product->title,
                    "qty" => 1,
                    "price" => $product->price,
                    "photo" => $product->imgs
                ]
            ];

            session()->put('cart', $item);
            return redirect('/home');

        }

        // if cart not empty then check if this product exist then increment quantity
        if ( isset( $cart[$id]) ){
            $cart[$id]['qty']++;

            session()->put('cart' , $cart);
            return redirect('/home');

        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [

                "title" => $product->title,
                "qty" => 1,
                "price" => $product->price,
                "photo" => $product->imgs

        ];

        session()->put('cart', $cart);
        return redirect('/home');
    }



        public function removeCart(Request $request)
        {
            if($request->id) {

                $cart = session()->get('cart');

                if(isset($cart[$request->id])) {

                    unset($cart[$request->id]);

                    session()->put('cart', $cart);
                }
                return redirect('/cart');

            }
        }

        public function addQty( Request $request){
               if ($request->id){
                   $cart = session()->get('cart');

                   if (isset($cart[$request->id])){
                       $cart[$request->id]['qty'] += 1;

                       session()->put('cart' , $cart);

                   }
                   return redirect('/cart');
               }
        }


    public function reduceQty( Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');

            if (isset($cart[$request->id])) {
                $cart[$request->id]['qty'] -= 1;

                session()->put('cart', $cart);

            }
            return redirect('/cart');
        }
    }

    public function  buyNow(Request $request){
       
        $user_id = Auth::id();
        $cart = session()->get('cart');
        $total = 0;
        foreach ( $cart as $id => $details ){
            $total += $details['qty'] * $details['price'];
            $od = new Orderdetails();

            $od->user_id = $user_id;
            $od->product_id = $id;
            $od->unit_price = $details['price'];
            $od->status = 0;
            $od->qty = $details['qty'];
            $od->total = $details['qty'] * $details['price'];
            $od->order_no = uniqid();

            $od->save();

        }

        $order_number = $od->order_no;
        $userid = $user_id;
        $orders = new Orders();
        $orders->user_id = $userid;
        $orders->order_no = $order_number;

        $orders->save();

        $user_Id = Auth::id();
        $payment = new Payments();

        $payment->user_id = $user_Id;
        $payment->amount = $total;
        $payment->status = 0;
        $payment->order_no = $order_number;

        $payment->save();

        $request->session()->flush();
         return redirect('/home');;

    }

}
