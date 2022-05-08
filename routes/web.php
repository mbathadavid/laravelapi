<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/',[UserController::class,'registerview']);
Route::get('/loginuser',[UserController::class,'loginuser']);
Route::post('/registeruser',[UserController::class,'registerwebuser']);
Route::post('/loginwebuser',[UserController::class,'loginwebuser']);
Route::get('/dashboard',[UserController::class,'dashboard']);