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

Route::get('/', function () {
    return view('welcome');
});

// ------------------------Admin-------------------------
//show the admin login page 
Route::get('/admin/login',[App\Http\Controllers\AdminController::class,'login']);  
//for admin to log in after create the login button
Route::post('/admin/login',[App\Http\Controllers\AdminController::class,'submitLogin']);  
//after login, show the admin dashboard
Route::get('/admin/dashboard',[App\Http\Controllers\AdminController::class,'dashboard']);  
Route::get('/admin/logout',[App\Http\Controllers\AdminController::class,'logout']);

// ----------------------Categories---------------------
//In this resource, we have CRUD function in order to save time and the codes more easy to find
Route::resource('admin/category',App\Http\Controllers\CategoryController::class);
//Delete the categories. Althouht this method is inside CategoryController,but we do not set update.blade.php in view   
Route::get('admin/category/{id}/delete',[App\Http\Controllers\CategoryController::class,'destroy']);

// ------------------------Posts-------------------------
Route::resource('admin/post',App\Http\Controllers\PostController::class);
Route::get('admin/post/{id}/delete',[App\Http\Controllers\PostController::class,'destroy']);

// ----------------------Setting-------------------------
Route::get('/admin/setting',[App\Http\Controllers\SettingController::class,'index']);
Route::post('/admin/setting',[App\Http\Controllers\SettingController::class,'save_settings']);

// ---------------------Home Page (Frontend)----------------------
Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');
Route::post('/home',[App\Http\Controllers\HomeController::class, 'searchPost']) ->name('search.post');
Route::get('/viewDetail/{slug}/{id}',[App\Http\Controllers\HomeController::class, 'detail']);


