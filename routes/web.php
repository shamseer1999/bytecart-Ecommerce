<?php

namespace App\Http\Controllers;

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


//login
Route::match(['GET','POST'],'/',[HomeController::class,'login'])->name('login');

Route::middleware('logged')->group(function(){
        //user
        Route::get('/users',[UserController::class,'users'])->name('users');
        Route::match(['GET','POST'],'/register',[UserController::class,'add'])->name('user.add');
        Route::match(['GET','POST'],'/edit-user{id}',[UserController::class,'edit'])->name('user.edit');
        Route::match(['GET','POST'],'/disable-user{id}',[UserController::class,'disable_user'])->name('user.disable');
        Route::match(['GET','POST'],'/enable-user{id}',[UserController::class,'enable_user'])->name('user.enable');
        Route::match(['GET','POST'],'/delete-user{id}',[UserController::class,'delete_user'])->name('user.delete');

        //category
        Route::get('/categories',[CategoryController::class,'index'])->name('categories');
        Route::match(['GET','POST'],'/add-category',[CategoryController::class,'add'])->name('category.add');
        Route::match(['GET','POST'],'/edit-category{id}',[CategoryController::class,'edit'])->name('category.edit');
        Route::match(['GET','POST'],'/delete-category{id}',[CategoryController::class,'delete'])->name('category.delete');

        //products
        Route::get('/products',[ProductController::class,'index'])->name('products');
        Route::match(['GET','POST'],'/add-product',[ProductController::class,'add'])->name('product.add');
        Route::match(['GET','POST'],'/edit-product{id}',[ProductController::class,'edit'])->name('product.edit');
        Route::match(['GET','POST'],'/delete-product{id}',[ProductController::class,'delete'])->name('product.delete');

        //dashbord
        Route::get('/dashbord',[UserController::class,'index'])->name('dashbord');
    

    //logout
    Route::get('/logout',[Usercontroller::class,'logout'])->name('logout');
});
