<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\TreeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [LoginController::class,'authenticate'] );
Route::post('/logout', [LoginController::class,'logout'] );

Route::get('/index', function () {
    return view('index');
})->name('index');


Route::get('/trees', [TreeController::class,'index'])->name('trees')->middleware('auth');

Route::get('/user-address', function () {
    return view('userAddress');
})->name('user-address');

Route::post('/storeaddress', [UserController::class,'store'])->name('store-address');
