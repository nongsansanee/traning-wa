@extends('layouts.app')
 
@section('title', 'Page Title')
 
@section('navbar')
    @parent
 
@endsection
 
@section('content')
<div >
    <h1 class=" text-green-800 font-bold text-3xl " >ต้นไม้</h1>
    @foreach ($trees as $tree)
    <div class=" w-full p-2 m-2 flex justify-between bg-yellow-200 rounded-md border-2 border-yellow-700 ">
        <div> 
            {{$tree->name}} ราคา {{$tree->price}} บาท {{$tree->remark}} 
        </div>
        <div>
            สถานะ: {{$tree->status}}
            <button class=" px-2 bg-blue-300 rounded-md shadow-md">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
            </button>
        </div>
    </div>
   
    
    @endforeach
</div>
@endsection
