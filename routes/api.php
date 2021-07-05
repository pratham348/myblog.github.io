<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIController;
use App\Http\Controllers\APIMemberController;


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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//Get Record
Route::get('blog',[APIController::class,'getBlog']);
Route::get('blog/{id}',[APIController::class,'getBlogId']);
//Add Record with Validation
Route::post('blog',[APIController::class,'putBlog']);
//Delete Record
Route::delete('blog/{id}',[APIController::class,'BlogDelete']);
//Update record
Route::put('blog',[APIController::class,"BlogUpdate"]);
//Search record
Route::get("search/{name}",[APIController::class,"search"]);


Route::apiResource('apidemo',APIMemberController::class);