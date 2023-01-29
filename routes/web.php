<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserAuth;
use App\Http\Controllers\ProfileController;

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

// Route::get('/', function () {
//     return view('home');
// });

Route::get("/",[HomeController::class, 'getData']);

Route::post("user",[UserAuth::class, 'userLogin']);

Route::get('/login', function(){
    if(session()->has('user')){
        return redirect('profile');
    }
    return view('login');
});


Route::get ("/profile",[ProfileController::class, 'getData']);

// Route::get('/profile', function(){
//     if(session()->has('user')){
//         return view('profile');
//     }
//     return redirect('login');
// });


Route::get('/logout', function(){
    if(session()->has('user')){
        session()->pull('user');
    }
    return redirect('login');
});

Route::get('register', function(){
    if(session()->has('user')){
        session()->pull('user');
    }
    return view('register');
});

Route::post('register',[UserAuth::class, 'register']);
Route::post('verification',[UserAuth::class, 'verification']);
Route::get('/verification', function(){
    return view('verification');
});

Route::post('addProduct',[ProfileController::class, 'saveProduct']);
Route::get('edit/{id}',[ProfileController::class, 'showData']);
Route::post('edit/edit',[ProfileController::class, 'updateProduct']);
Route::get('delete/{id}',[ProfileController::class, 'delete']);
