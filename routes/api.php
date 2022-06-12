<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\SocialmediaController;
//use App\Models\School;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/registeruser',[UserController::class,'registerapiuser']);
Route::post('/loginapiuser',[UserController::class,'loginapiuser']);
Route::get('/getschools',[SchoolController::class,'getSchools']);
Route::post('/makepost',[SocialmediaController::class,'makePost']);
Route::get('/fetchposts/{type}',[SocialmediaController::class,'fetchPosts']);
Route::get('/fetchreplies/{pid}',[SocialmediaController::class,'fetchReplies']); 
Route::get('/fetchnotifications/{uid}',[SocialmediaController::class,'fetchNotifications']);
Route::get('/readnotification/{uid}',[SocialmediaController::class,'readNotification']);

// Route::get('/public/images/{filename}', function($filename){
//     //$path = resource_path() . '/images/' . $filename;
//     $path = resource_path() .  $filename;

//     if(!File::exists($path)) {
//         return response()->json(['message' => 'Image not found.'], 404);
//     }

//     $file = File::get($path);
//     $type = File::mimeType($path);

//     $response = Response::make($file, 200);
//     $response->header("Content-Type", $type);

//     return $response;
// });