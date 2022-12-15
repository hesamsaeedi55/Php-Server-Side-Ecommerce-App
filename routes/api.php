<?php
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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



    Route::group(['middleware' =>['auth:sanctum']] , function () {

        Route::post('/logout', [AuthController::class, 'logout']);

    
    });

    Route::get('/search/{name}/{page}', [ProductController::class, 'search']);

    Route::get('/products/{cat}/{page}',[ProductController::class, 'index']);


    Route::post('/login',[AuthController::class, 'login']);





// Route::get('/products/{id}', [ProductController::class, 'find']);


Route::post('/register',[AuthController::class, 'register']);

Route::get('/findid/{email}',[AuthController::class, 'findid']);

Route::get('/show',[ProductController::class, 'show']);

Route::get('/show/{id}',[ProductController::class, 'showbyid']);

Route::get('/reduce/{id}',[ProductController::class, 'reduce']);



Route::post('/products',[ProductController::class, 'store']);

Route::post('/update/{id}',[ProductController::class, 'update']);

Route::post('/products/{id}',[ProductController::class, 'destroy']);


Route::post('/purchase',[ProductController::class, 'purchase']);
Route::post('/wishlist',[ProductController::class, 'wishlist']);

Route::get('/wishlist/{uid}/{pid}',[ProductController::class, 'wishlistid']);

Route::get('/wishlistshow/{id}/{page}',[ProductController::class, 'wishlistshow']);
