<?php

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

// ---------------------------------------Admin------------------------------------
//show the admin login page 
Route::get('/admin/login',[App\Http\Controllers\AdminController::class,'login']);  
//for admin to log in after create the login button
Route::post('/admin/login',[App\Http\Controllers\AdminController::class,'submitLogin']);  
//after login, show the admin dashboard
Route::get('/admin/dashboard',[App\Http\Controllers\AdminController::class,'dashboard']);  
Route::get('/admin/logout',[App\Http\Controllers\AdminController::class,'logout']);

// -------------------------------------Categories---------------------------------
//In this resource, we have CRUD function in order to save time and the codes more easy to find
Route::resource('admin/category',App\Http\Controllers\CategoryController::class);
//Delete the categories. Althouht this method is inside CategoryController,but we do not set update.blade.php in view   
Route::get('admin/category/{id}/delete',[App\Http\Controllers\CategoryController::class,'destroy']);

// ----------------------------------------Posts------------------------------------
Route::resource('admin/post',App\Http\Controllers\PostController::class);
Route::get('admin/post/{id}/delete',[App\Http\Controllers\PostController::class,'destroy']);

// ---------------------------------------Comments------------------------------------
Route::get('admin/comment',[App\Http\Controllers\AdminController::class,'comments']);
Route::get('admin/comment/delete/{id}',[App\Http\Controllers\AdminController::class,'delete_comment']);

// ----------------------------------------Users------------------------------------
Route::get('admin/user',[App\Http\Controllers\AdminController::class,'users']);
Route::get('admin/user/delete/{id}',[App\Http\Controllers\AdminController::class,'delete_user']);

// ---------------------------------------Setting------------------------------------
Route::get('/admin/setting',[App\Http\Controllers\SettingController::class,'index']);
Route::post('/admin/setting',[App\Http\Controllers\SettingController::class,'save_settings']);

// ------------------------------------Home Page (Frontend)--------------------------
Route::get('/',[App\Http\Controllers\HomeController::class,'index']);
Route::get('/viewDetail/{slug}/{id}',[App\Http\Controllers\HomeController::class, 'detail']);
Route::get('/all-categories',[App\Http\Controllers\HomeController::class,'all_category']);
Route::get('/category/{slug}/{id}',[App\Http\Controllers\HomeController::class, 'category']);
Route::post('/save-comment/{slug}/{id}',[App\Http\Controllers\HomeController::class,'save_comment']);
Route::get('save-post-form',[App\Http\Controllers\HomeController::class,'save_post_form']);
Route::post('save-post-form',[App\Http\Controllers\HomeController::class,'save_post_data']);
Route::get('ManagePost',[App\Http\Controllers\HomeController::class,'manage_posts']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


