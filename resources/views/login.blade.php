@extends('layouts.app')
 
@section('title', 'Page Title')
 
@section('navbar')
    @parent
@endsection
 
@section('content')
<form method="POST" action="/login">
    @csrf
      {{-- <div class="my-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
          <input type="text"  class="form-control" id="staticEmail" name="email" value="julee.j@gmail.com">
        </div>
      </div> --}}
        <div class="my-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Username</label>
        <div class="col-sm-10">
          <input type="text"  class="form-control" id="staticEmail" name="name" value="julee" >
        </div>
      </div>
      <div class="mb-3 row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" name="password" id="inputPassword">
        </div>
      </div>
      <div class="mb-3 p-2 mx-2 row bg-blue-800 text-white rounded-md">
        <button type="submit" >LOGIN</button>
      </div>
</form>
    
@endsection