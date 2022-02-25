@extends('layouts.app')
 
@section('title', 'Page Title')
 
@section('navbar')
    @parent
@endsection
 
@section('content')
<form method="POST" action="/login">
    @csrf
    <div class="my-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
          <input type="text"  class="form-control" id="staticEmail" name="email" value="julee.j@gmail.com">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" name="password" id="inputPassword">
        </div>
      </div>
      <div class="mb-3 mx-2 row">
        <button type="submit" class="btn btn-primary mb-3">LOGIN</button>
      </div>
</form>
    
@endsection