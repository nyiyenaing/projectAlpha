@extends('layout.master')

@section('title' , 'Register Form')

@section('content')

        <div class="container">
            <div class="well">
              <h1>Register</h1>
              @foreach($errors->all() as $error )
                <p class = 'alert alert-danger'>{{$error}}</p>
                @endforeach
                <form class="form-horizontal" method = "post" >
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">username</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="col-sm-2 control-label">Comfirm Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="comfirmedpassword" name="password_comfirmation" placeholder="Comfirm Password">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="address" class="col-sm-2 control-label">Address</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="address" name="address" placeholder="Address">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="phone" class="col-sm-2 control-label">Phone</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone">
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default show" name="SignUp">Sign Up</button>
                        </div>
                    </div>



                </form>

@endsection
