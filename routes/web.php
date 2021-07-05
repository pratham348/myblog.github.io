<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dbController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\SendMailController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;

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



 //Register routes
 Route::view('register','register');
 Route::post('registerpro',[LoginController::class,'register']);

 //Login Routs
 Route::view('login','login');
 Route::post('loginpro',[LoginController::class,'customLogin']);

 //View blog from user
 //Route::view('blog','blog');
 Route::get('index',[BlogController::class,'getBlog']);
 Route::get('/',[BlogController::class,'getBlog']);

 Route::get('ShowCategory',[BlogController::class,'getCategory']);
 //show perticular category blog
 Route::get('SeeCaegory/{id}',[BlogController::class,'getCatDetail']);
 //show perticular blog
 Route::get('ShowBlog/{id}',[BlogController::class,'SeeBlog']);
 

//************Header Routs***************************
//HOME
Route::get('index',[BlogController::class,'getBlog']);
Route::get('/',[BlogController::class,'getBlog']);
//CATEGORIES
Route::get('ShowCategory',[BlogController::class,'getCategory']);
//NEW UPLOADS
Route::get('newUploads',[BlogController::class,'getNew']);
//FEEDBACK
Route::get('feedback',[BlogController::class,'showFeedback']);
//ABOUT
Route::get('about',[BlogController::class,'showAbout']);
//Search
Route::get('search', [BlogController::class, 'search']);
//************Header Routs***************************

Route::post('submitFeedback',[BlogController::class,'insertFeedback']);
Route::post('doSubscribe',[BlogController::class,'insertSubscriber']);






 //After session rout with middleware
Route::group(['middleware'=>['AuthCheck']],function(){



    //Logout Rout
    Route::get('logout',[LoginController::class,'logout']);

    //Dashboard
    //Route::view('dashboard','dashboard');
    Route::get('dashboard',[dbController::class,'getDashboard']);

    //Add Blog
    //Route::view('add','addBlog');
    Route::get('add',[dbController::class,'getCategory']);
    Route::post('add',[dbController::class,'addBlog']);
    
    //Add Category 
    Route::view('category','addCategory');
    Route::post('category',[dbController::class,'addCategory']);

    //View Category
    Route::get('viewCategory',[dbController::class,'getCategoryData']);
    
    //View blog
    Route::get('viewblog',[dbController::class,'getData']);
    //View blog in detail
    Route::get('viewIndetail/{id}',[dbController::class,'getDetail']);
    //Edit Blog
    Route::get('edit/{id}',[dbController::class,'editBlog']);
    Route::post('update',[dbController::class,'updateBlog']);

    //Delete Blog
    Route::get('delete/{id}',[dbController::class,'deleteBlog']);
    
    //Ststus update
    Route::get('inactive-status/{id}',[dbController::class,'inactiveStatus']);
    Route::get('active-status/{id}',[dbController::class,'activeStatus']);
    
    //View Subscriber
    Route::get('viewSubscriber',[dbController::class,'getSubscriber']);
    
    //View Feedback
    Route::get('viewFeedback',[dbController::class,'getFeedback']);
    //Change Password
    Route::view('change','changePassword');
    Route::post('changePass',[dbController::class,'changePassword']);

    //Send Notification
    //Send Mail
    Route::view('sendNotification','sendNotification');
    Route::get('send-mail', [SendMailController::class, 'sendEmail']);
    //Route::get('send-email', [SendMailController::class, 'sendEmail']);
});

//Forgot password 
Route::get('/forget-password', [ForgotPasswordController::class,'getEmail']);
Route::post('/forget-password', [ForgotPasswordController::class,'postEmail']);

Route::get('/reset-password/{token}', [ResetPasswordController::class,'getPassword']);
Route::post('/reset-password', [ResetPasswordController::class,'updatePassword']);