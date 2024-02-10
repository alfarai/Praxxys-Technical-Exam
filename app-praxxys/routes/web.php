<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});
#name of url, name of controller associated, name of function in controller,name of route
#dont forget to import controller
#middleware aliases are in kernel.php
Route::group(['middleware'=>'auth'],function(){
    Route::get('/product',[ProductController::class,'index'])->name('product.index'); #get index page
    Route::get('/product/create',[ProductController::class,'create'])->name('product.create'); #get create page
    Route::post('/product',[ProductController::class,'store'])->name('product.store'); #saving products to db
    Route::get('/product/{product}/edit',[ProductController::class,'edit'])->name('product.edit'); #get edit page with product to be edited
    Route::put('/product/{product}/update',[ProductController::class,'update'])->name('product.update'); #update products from edit page
    Route::delete('/product/{product}/delete',[ProductController::class,'delete'])->name('product.delete'); #update products from edit page
    Route::post('',[UserController::class,'logout'])->name('user.logout'); #auth user via login
});

Route::group(['middleware'=>'guest'],function(){
    Route::get('/login',[UserController::class,'loginPage'])->name('user.login'); #get login page
    Route::post('/login',[UserController::class,'login'])->name('user.login'); #auth user via login
    Route::get('/register',[UserController::class,'registerPage'])->name('user.register'); #get register page
    Route::post('/register',[UserController::class,'register'])->name('user.register'); #create new user
});


