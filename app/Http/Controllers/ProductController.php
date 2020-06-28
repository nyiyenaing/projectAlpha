<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductInsertFormRequest;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = Categories::all();

            return view('/product/create', compact('product'));



    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductInsertFormRequest $request)
    {

        $file = $request->file('file');
        $filename = uniqid() . $file->getClientOriginalName();
        $file->move( 'asset/upload/' , $filename);

         Product::create([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'price' => $request->get('price'),
            'category_id' => $request->get('category_id'),
            'imgs' => $filename

        ]);

        return redirect('/product/create')->with('status' , 'Product created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $product = Product::all();
        return view('home' , compact('product'));

    }

    public function manage(){

        $data = DB::select('select products.*, categories.name FROM products LEFT JOIN categories ON products.category_id = categories.id');
        return view('/product/manage' , compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = DB::select("SELECT * FROM products WHERE  id=$id");
        $category = Categories::all();

        return view('/product/editproduct')->with(compact('product','id','category'));
        }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $file = $request->file('file');
        $update = Product::find($id);
        if ($file){
            $filename = uniqid() . $file->getClientOriginalName();
            $file->move( 'asset/upload/' , $filename);

            $update->title = $request->title;
            $update->description = $request->description;
            $update->price = $request->price;
            $update->category_id = $request->category_id;
            $update->imgs = $filename;

            $update->save();

        }else{

            $update->title = $request->title;
            $update->description = $request->description;
            $update->price = $request->price;
            $update->category_id = $request->category_id;

            $update->save();
        }

        return redirect('/product/manage');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Product::find($id);
        $delete->delete();

        return redirect('/product/manage');
    }

    public function detail($id)
    {
        $detail = Product::find($id);

        return view('detail' , compact('detail'));
    }
}
