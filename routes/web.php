<?php
use App\User;
use App\Product;
use App\Categories;

Route::get('/home' , 'ProductController@show');

 /* ------------------- CRUD PRODUCT ------------------------- */

//Route::get('/product/create' , 'ProductController@create');
//Route::post('/product/create' , 'ProductController@store');

//Route::get('/product/show' , 'ProductController@show');
//Route::get('/product/manage' , 'ProductController@manage');

//Route::get('/product/edit/{id}' , 'ProductController@edit');
//Route::post('/product/edit/{id}' , 'ProductController@update');
//Route::get('/product/delete/{id}' , 'ProductController@destroy');

/* --------------------- End PRODUCT ---------------------------*/

/* -------------------- CRUD CATEGORY ------------------------- */

//Route::get('/category/create' , 'CategoryController@create');
//Route::post('/category/create' , 'CategoryController@store');
//Route::get('/category/read/' , 'CategoryController@show');

//Route::get('/category/edit/{id}' , function ($id)
//{
//    return view('admin/editCategory', compact('id'));
//} );

//Route::post('/category/edit/{id}' , 'CategoryController@update');
//Route::get('/category/delete/{id}' , 'CategoryController@destroy');
/* -------------------- End CATEGORY ----------------------------*/

/* ----------------------- Cart ----------------------------------*/

Route::get('/cart/{id}' , 'CartController@addtoCart');
Route::get('/cart' , 'CartController@view');
Route::get('/addQty/{id}' , 'CartController@addQty');
Route::get('/reduceQty/{id}' , 'CartController@reduceQty');
Route::get('/removeCart/{id}' , 'CartController@removeCart');
Route::get('/buyNow', 'CartController@buyNow');

/* ----------------------- End Cart ------------------------------*/

/* ----------------------- Order ---------------------------------*/

//Route::get('order/orderList' , 'OrderController@show');
//Route::get('order/orderStatus/{id}' , "OrderController@statusUpdate");

/* ---------------------- End Order ------------------------------*/

/* --------------------- Login/Register/Logout ---------------------*/

Route::get('/signIn' , 'AuthController@signIn');
Route::post('/signIn' , 'AuthController@login');

Route::get('/signUp' , 'AuthController@signUp');
Route::post('/signUp' , 'AuthController@register');

Route::get('/logout',  'AuthController@logout');

/* ------------------- End Login/Register/Logout -------------------*/

Route::group( array( 'middleware' => [ 'admin' ]  ), 
function()
{
 /* ------------------- CRUD PRODUCT ------------------------- */ 
Route::get('/product/create' , 'ProductController@create');
Route::post('/product/create' , 'ProductController@store');

Route::get('/product/show' , 'ProductController@show');
Route::get('/product/manage' , 'ProductController@manage');

Route::get('/product/edit/{id}' , 'ProductController@edit');
Route::post('/product/edit/{id}' , 'ProductController@update');
Route::get('/product/delete/{id}' , 'ProductController@destroy');

Route::get('/detail/{id}' , 'ProductController@detail');

/* --------------------- End PRODUCT ---------------------------*/

/* -------------------- CRUD CATEGORY ------------------------- */

Route::get('/category/create' , 'CategoryController@create');
Route::post('/category/create' , 'CategoryController@store');
Route::get('/category/read/' , 'CategoryController@show');

Route::get('/category/edit/{id}' , function ($id)
{
    return view('admin/editCategory', compact('id'));
} );

Route::post('/category/edit/{id}' , 'CategoryController@update');
Route::get('/category/delete/{id}' , 'CategoryController@destroy');
/* -------------------- End CATEGORY ----------------------------*/

/* ----------------------- Order ---------------------------------*/

Route::get('order/orderList' , 'OrderController@show');
Route::get('order/orderStatus/{id}' , "OrderController@statusUpdate");

/* ---------------------- End Order ------------------------------*/
});
