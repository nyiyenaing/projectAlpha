@extends('layout.master')

@section('title' , 'cart')

@section('content')
    <div class="container">

        <table id="cart" class="table table-hover table-condensed">
            <thead>
            <tr>
                <th style="width:50%">Product</th>
                <th style="width:10%">Price</th>
                <th style="width:8%">Quantity</th>
                <th style="width:22%" class="text-center">Subtotal</th>
                <th style="width:10%"></th>
            </tr>
            </thead>
            <tbody>

            <?php $total = 0 ?>

            @if(session('cart'))
                @foreach(session('cart') as $id => $details)

                    <?php $total += $details['price'] * $details['qty'] ?>

                    <tr>

                <td data-th="Product">
                    <div class="row">
                        <div class="col-sm-2 hidden-xs"><img src="{{ asset('asset/upload/' . $details['photo'])}}" width="100" height="100" class="img-responsive"/></div>
                        <div class="col-sm-10">
                            <h4 class="nomargin">{{ $details['title'] }}</h4>
                            </div>
                    </div>
                </td>
                <td data-th="Price">${{ $details['price'] }}</td>
                <td data-th="Quantity">
                    {{ $details['qty'] }}
                </td>
                <td data-th="Subtotal" class="text-center">${{ $details['price'] * $details['qty'] }}</td>
                <td class="actions" data-th="">
                <a href="{{url('/addQty/' . $id)}}"><span class="glyphicon glyphicon-plus" aria-hidden="true" style="color: black"></span></a>
                <a href="{{url('/reduceQty/' . $id)}}"><span class="glyphicon glyphicon-minus" aria-hidden="true" style="color: black"></span></a>
                <a href="{{url('removeCart/' . $id)}}"><span class="glyphicon glyphicon-trash" aria-hidden="true" style="color: darkred"></span></a>
                </td>
            </tr>

                @endforeach
            @endif
            </tbody>
            <tfoot>

            <tr>
                <td><a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
                <td colspan="2" class="hidden-xs"></td>
                <td class="hidden-xs text-center"><strong>Total ${{ $total }}</strong></td>
                
                @if(!Auth::check())
                    
                <td><a href="{{url('/signIn')}}" class="btn btn-success btn-block">Sign In</a></td>
                <td><a href="{{url('/signUp')}}" class="btn btn-primary btn-block">Sign up Now</a></td>
                
                @else
                
                <td><a href="{{url('/buyNow')}}" class="btn btn-primary btn-block">Buy Now</a></td>    
                
                @endif

            </tr>

                        </tfoot>
        </table>
    </div>
@endsection
