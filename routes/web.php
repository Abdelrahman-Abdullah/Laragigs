<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [ListingController::class , 'index']);
Route::get('/listing/{listing:title}', [ListingController::class , 'show']);

Route::group(['middleware' => 'auth'] , function (){
    Route::post('/logout' , [UserController::class , 'destroy']);
    Route::get('/listings/create' , [ListingController::class , 'create']);
    Route::post('/listings' , [ListingController::class , 'store']);
    Route::put('/listings/{listing}', [ListingController::class , 'update']);
    Route::delete('/listings/{listing}', [ListingController::class , 'destroy']);
    Route::get('/listings/{listing}/edit' , [ListingController::class , 'edit']);
    Route::get('/listings/manage' , [ListingController::class , 'manage']);
});

Route::group(['middleware' => 'guest'] , function () {
    Route::get('/register' , [UserController::class , 'create']);
    Route::get('/login' , [UserController::class , 'login'])->name('login');
    Route::post('/users' , [UserController::class , 'store']);
    Route::post('/users/login' , [UserController::class , 'authenticate']);
});


