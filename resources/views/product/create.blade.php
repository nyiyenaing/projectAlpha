@extends('layout.master')

@section('title' , 'Insert Product')

@section('content')
        <div class="container col-md-8 col-md-offset-2">
            <div class="well">
                @if(session('status'))
                    <p class="alert alert-success">{{session('status')}}</p>
                    @endif
                @foreach($errors->all() as $error)

                @endforeach
                <form method="post" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Title">
                    </div>


                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="price" class="form-control" name="price" id="price" placeholder="price">
                    </div>

                    <div class="form-group">
                        <label for="Description">Description</label>
                        <textarea class="form-control" name="description" id="description" ></textarea>
                    </div>


                    <div class="form-group">
                        <select class="form-control" name="category_id" id="category_id">
                            <option value="0">-- Choose Category --</option>
                            @foreach($product as $item )
                            <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="file" id="image">
                        </div>


                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>
        </div>
    @endsection