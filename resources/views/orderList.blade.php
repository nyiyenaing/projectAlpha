@extends('layout.master')

@section('title' , 'Order Management')

@section('content')

<div class='container'>

    <input class="form-control" id="myInput" type="text" placeholder="Search..">
    <br>
    
    <table id="orderTable" class="table table-striped">
       <thead id="thead">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Order Items</th>
            <th>Status</th>
        </tr>
        </thead>

        @foreach( $orders as $order)
        <tbody id="tbody">
        <tr>
            <td >{{$order->name}}</td>
            <td >{{$order->email}}</td>
            <td>{{$order->phone}}</td>
            <td>{{$order->address}}</td>
            
        <?php
          $user_id = $order->id;

          $items = DB::select("select orderdetails.* , products.title
          from orderdetails left join products on orderdetails.product_id = products.id
          where orderdetails.user_id = $user_id");
        ?>
        
        <td>
        @foreach($items as $item)
        {{$item->title}} ,<br>
        @endforeach
        </td>
        
        <td>
        @if($order->status == 1)
        <a href="{{url('order/orderStatus/' . $order->id ) }}" ><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></a>
        @else
        <a class="text-danger" href="{{url('order/orderStatus/' . $order->id ) }}"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
        @endif
        </td>

        </tr>

    </tbody>
    @endforeach
    </table>


</div>

@endsection
    
@section('script')

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#orderTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });


});
</script>



@endsection





