@extends('layout.master')

@section('title' , 'Edit Product')

@section('content')


    @foreach ($product as $item)

        <div class="container col-md-8 col-md-offset-2">
            <div class="well">
                <h2>Edit Product</h2> <br>
                <form method="post" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <input type="hidden" name="id" id="id" value='{{$id}}'>

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" id="title" value="{{$item->title}}">
                    </div>


                    <div class="form-group">
                        <label for="Description">Description</label>
                        <textarea class="form-control" name="description" id="description" >
                        {{$item->description}}
                    </textarea>
                    </div>


                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="price" class="form-control" name="price" id="price" value="{{$item->price}}">
                    </div>


                    <div class="form-group">
                        <label for="choose category">Choose Category</label>
                        <select class="form-control" name="category_id" id="category_id">
                            @foreach ($category as $cat)
                                <option value="{{$cat->id}}"  @if( $cat->id == $item->category_id )
                                    {{'Selected'}} @endif >

                                    {{$cat->name}}
                                </option>

                            @endforeach

                        </select>
                    </div>

                    <div class="form-group">

                        <img src="{{asset('/asset/upload/' . $item->imgs)}}" class="img-thumbnail">
                        <br><br>
                        <input type="file" name="file" id="image" >
                    </div>


                    @endforeach


                    <button type="submit" class="btn btn-default">Update</button>
                     </form>
                         </div>
                          </div>
    @endsection