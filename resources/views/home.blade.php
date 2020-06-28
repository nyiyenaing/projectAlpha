@extends('layout.master')

@section('title' , 'Home')

@section('content')
    <div class="container-fluid" >
        <div class="row">

            <div class="col-md-2">
                @include('layout\sidebar');
            </div>
            <!---           Product start   ---->

            <div class="col-md-10">

                @foreach($product as $item)
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="{{asset('asset/upload/' . $item->imgs)}}" style="width: 260px; height: 240px;">
                        <div class="caption">
                            <h3 style="text-align: center">{{$item->title}}</h3>
                            <p>{{$item->description}}</p>
                            <p><a href="{{  url('/detail/' . $item->id ) }}" class="btn btn-info" role="button">View Detail</a>
                                <a href="{{ url('/cart/' . $item->id)    }}" class="btn btn-info pull-right" role="button">Add to Cart</a>
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
                <!---           Product end     ---->
            </div>

        </div>
    </div>
@endsection

