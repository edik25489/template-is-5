<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FavoritesController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebController;
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
// страницы
Route::get('/',[WebController::class,'index'])->name('index');
Route::get('/login',[WebController::class,'loginUser'])->name('loginUser');
Route::get('/register',[WebController::class,'registerUser'])->name('registerUser');
Route::get('/manager/login',[WebController::class,'loginManager'])->name('loginManager');
Route::get('/admin/login',[WebController::class,'loginAdmin'])->name('loginAdmin');

// функции
Route::post('/login',[UserController::class,'login'])->name('login');
Route::post('/register',[UserController::class,'register'])->name('register');

Route::post('/manager/login',[ManagerController::class,'login'])->name('managerLogin');
Route::post('/admin/login',[AdminController::class,'login'])->name('adminLogin');

Route::middleware('auth:user')->group(function (){
    Route::get('/logout',[UserController::class,'logout'])->name('userLogout');
    // страницы
    Route::get('/user/cart',[UserController::class,'userCart'])->name('userCart');
    Route::get('/user/buy',[UserController::class,'userBuy'])->name('userBuy');
    Route::get('/user/comment',[UserController::class,'userComment'])->name('userComment');
    Route::get('/user/favorites',[UserController::class,'userFavorites'])->name('userFavorites');
    Route::get('/user/history',[UserController::class,'userHistory'])->name('userHistory');
    // корзина
    Route::post('/cart/add/{product}',[CartController::class,'create'])->name('cartAdd');
    Route::post('/cart/buy/{cart}',[CartController::class,'buy'])->name('cartBuy');
    Route::post('/cart/delete/{cart}',[CartController::class,'delete'])->name('cartDelete');
    // отзывы
    Route::post('/comment/add/{product}',[CommentController::class,'create'])->name('commentAdd');
    Route::post('/comment/edit/{product}',[CommentController::class,'edit'])->name('commentEdit');
    Route::post('/comment/delete/{product}',[CommentController::class,'delete'])->name('commentDelete');
    // избранное
    Route::post('/favorites/add/{product}',[FavoritesController::class,'create'])->name('favoritesAdd');
    Route::post('/favorites/delete/{product}',[FavoritesController::class,'delete'])->name('favoritesDelete');
    // история
    Route::post('/confirm/{cart}',[HistoryController::class,'create'])->name('confirmBuy');
});

Route::middleware('auth:manager')->group(function (){
    Route::post('/manager/logout',[ManagerController::class,'logout'])->name('managerLogout');
    // страницы
    Route::get('/manager/category',[CategoryController::class,'index'])->name('managerCategory');
    Route::get('/manager/product',[ProductController::class,'index'])->name('managerProduct');
    Route::get('/manager/buyer',[CartController::class,'buyer'])->name('managerBuyer');
    Route::get('/manager/comment/{product}',[CommentController::class,'show'])->name('managerComment');
});
