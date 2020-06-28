@extends('layout\master')

@section('title' , 'Create Role')

@section('content')

  <div class="container-fluid">
        <div class="well">
        
        <h1>Create Role</h1> <br>
            <form method="post">
                {{csrf_field()}}
                @if(session('status'))
                    <p class="alert alert-success">{{session('status')}}</p>
                    @endif
                <div class="form-group">
                    <label for="name">Role Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Role Name">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        
        </div>
  </div>

@endsection