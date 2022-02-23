@extends('layouts.app')
 
@section('title', 'Page Title')
 
@section('navbar')
    @parent
 
    <p>This is appended to the master sidebar.</p>
@endsection
 
@section('content')
    <div  >
        <h1>ต้นไม้</h1>
        @foreach ($trees as $tree)
         <li>{{$tree->name}} ราคา {{$tree->price}} บาท {{$tree->remark}} สถานะ: {{$tree->status}}</li>
        @endforeach
    </div>
@endsection
