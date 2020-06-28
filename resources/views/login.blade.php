@extends('layout.master')

@section('title' , 'Login Page')

@section('content')

 <div class="container">
    <div class="well">

    
     @if (Session::has('failed'))
        <div class="alert alert-warning">
            <span class="glyphicon glyphicon-warning-sign"></span>
               {{ Session::get('failed') }}
        </div>
    @endif
    
     <form class="form-horizontal" method="post" >
      {{csrf_field()}}
      

       <div class="form-group">
    
      
         <label for="Email" class="col-sm-2 control-label">Email</label>
         <div class="col-sm-10">
           <input type="email" class="form-control" id="email" name = 'email' placeholder="Email">
         </div>
       </div>

       <div class="form-group">
         <label for="Password" class="col-sm-2 control-label">Password</label>
         <div class="col-sm-10">
           <input type="password" class="form-control" id="password" name="password" placeholder="Password">
         </div>
       </div>

       <div class="form-group">
         <div class="col-sm-offset-2 col-sm-10">
           <button type="submit" class="btn btn-default">Sign in</button> <br><br>
           <p>Already have a account? <a href="{{url('signUp')}}">Sign In ></a></p>
         </div>
       </div>
     </form>
    </div>
 </div>


@endsection
