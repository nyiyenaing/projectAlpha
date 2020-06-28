<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Users;
use App\Payments;
use App\Orders;
use App\Orderdetails;
class AuthController extends Controller
{

    public function signIn()
    {
        return view('login');

    }

    public function signUp()
    {
        return view('register');
    }


    public function register(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6|same:password_comfirmation',
            'phone' => 'required',
            'address' => 'required',
        ]);

        $user = new Users();
        $user->name = $validateData['name'];
        $user->email = $validateData['email'];
        $user->password = bcrypt($validateData['password']);
        $user->phone = $validateData['phone'];
        $user->address = $validateData['address'];
        $user->status = 0;

        $user->save();

        return view('cart');


    }


    public function login (Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) 
        {
            
            return view('cart');
        }
        else
        {
            return redirect()->back()->with('failed' , 'Email or Password is wrong , Please try again!');
        }

    }

    public function logout()
    {
        Auth::logout();
 
         return redirect('/home');;

    }


    
}
