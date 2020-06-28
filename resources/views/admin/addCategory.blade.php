@extends('layout.master')

@section('title' , 'Create Category')

@section('content')
         <div class="container">
        <div class="well">
            <h1>Create Category</h1> <br>
            <form method="post">
                {{csrf_field()}}
                @if(session('status'))
                    <p class="alert alert-success">{{session('status')}}</p>
                    @endif
                <div class="form-group">
                    <label for="name">Category Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Category Name">
                </div>
                <div class="form-group">
                    <label for="Remark">Remark</label>
                    <textarea name="remark" id="remark" class="form-control" placeholder="Remark"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>

    @endsection
