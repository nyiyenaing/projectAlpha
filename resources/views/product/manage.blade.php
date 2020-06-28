@extends('layout.master')

@section('title' , 'content')

@section('content')

    <div class="container">
        <div class="well">
            <h2>Manage Products</h2>

            <table class="table table-striped">
                <tr>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th></th>
                </tr>
                @foreach( $data as $item )
                <tr>

                    <td>{{$item->title}}</td>
                    <td><img src="{{asset('/asset/upload/' . $item->imgs)}}" style="width: 180px; height: 175px;"</td>
                    <td>{{$item->price}} $</td>
                    <td>{{$item->description}}</td>
                    <td>{{$item->name}}</td>

                    <td>
                        <a href="{{url('/product/edit/' . $item->id)}}"  > <span class="glyphicon glyphicon-pencil" ></span>&nbsp;&nbsp;</a>
                        <a href="{{url('/product/delete/' . $item->id)}}"  > <span class="glyphicon glyphicon-trash" style="color: darkred"> </span></a>

                    </td>
                </tr>
                @endforeach


            </table>
        </div>

    </div>



    @endsection