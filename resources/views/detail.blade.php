@extends('layout.master')

@section('title' , 'Product Detail')

@section('content')

<div class='container-fluid'>
    <div class='well'>
        <div>
        <img src="{{asset('asset/upload/' . $detail->imgs)}}" style="width: 260px; height: 240px;">
       
        <div>
         {{ 'hello'}}
        
        </div>
        
        </div>
       
            
        
    </div>
</div>


@endsection