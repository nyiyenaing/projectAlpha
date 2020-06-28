@extends('layout.master')

@section('title' , 'Category Lists')

@section('content')
  <div class="container">
      <div class="well">
          <h1>Category Lists</h1>

          <table class="table table-striped">
              <tr>
                  <th>Name</th>
                  <th>Remark</th>
                  <th></th>
              </tr>

              @foreach($categories as $category)
                  <tr>
                      <td>{{$category->name}}</td>
                      <td>{{$category->remark}}</td>
                      <td>
                          <a href="{{url('/category/edit/' . $category->id )}}"  > <span class="glyphicon glyphicon-pencil" ></span>&nbsp;&nbsp;</a>
                          <a href="{{url('/category/delete/' . $category->id )}}"  > <span class="glyphicon glyphicon-trash" style="color: darkred"> </span></a>

                      </td>
                  </tr>
              @endforeach
          </table>
      </div>

  </div>
    @endsection