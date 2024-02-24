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
Route::get('/',[WebController::class,'index'])->name('index'); // главная
Route::get('/product/{product}',[WebController::class,'product'])->name('product'); // отдельный продукт
Route::get('/login',[WebController::class,'loginUser'])->name('loginUser'); // авторизация пользователя
Route::get('/register',[WebController::class,'registerUser'])->name('registerUser'); // регистрация пользователя
Route::get('/manager/login',[WebController::class,'loginManager'])->name('loginManager');// авторизация менеджера
Route::get('/admin/login',[WebController::class,'loginAdmin'])->name('loginAdmin');// регистрация менеджера

// функции
Route::post('/login',[UserController::class,'login'])->name('login');
Route::post('/register',[UserController::class,'register'])->name('register');

Route::post('/manager/login',[ManagerController::class,'login'])->name('managerLogin');
Route::post('/admin/login',[AdminController::class,'login'])->name('adminLogin');

Route::middleware('auth:user')->group(function (){
    Route::get('/logout',[UserController::class,'logout'])->name('userLogout');
    // страницы
    Route::get('/user/cart',[UserController::class,'userCart'])->name('userCart'); //корзина
    Route::get('/user/buy',[UserController::class,'userBuy'])->name('userBuy');//покупки
    Route::get('/user/comment',[UserController::class,'userComment'])->name('userComment'); //комментарии
    Route::get('/user/favorites',[UserController::class,'userFavorites'])->name('userFavorites');//избранное
    Route::get('/user/history',[UserController::class,'userHistory'])->name('userHistory');//история
    // корзина
    Route::post('/cart/add/{product}',[CartController::class,'create'])->name('cartAdd');
    Route::post('/cart/{cart}/dif',[CartController::class,'difCount'])->name('cartDifCount'); // уменьшить количество
    Route::post('/cart/{cart}/add',[CartController::class,'addCount'])->name('cartAddCount');
    Route::post('/cart/buy/{cart}',[CartController::class,'buy'])->name('cartBuy');
    Route::post('/cart/delete/{cart}',[CartController::class,'delete'])->name('cartDelete');
    // отзывы
    Route::post('/comment/add/{product}',[CommentController::class,'create'])->name('commentAdd');
    Route::post('/comment/edit/{product}',[CommentController::class,'edit'])->name('commentEdit');
    Route::post('/comment/delete/{product}',[CommentController::class,'delete'])->name('commentDelete');
    // избранное
    Route::post('/favorites/add/{product}',[FavoritesController::class,'create'])->name('favoritesAdd');
    Route::post('/favorites/delete/{favorites}',[FavoritesController::class,'delete'])->name('favoritesDelete');
    // история
    Route::post('/confirm/{cart}',[HistoryController::class,'create'])->name('delivered');
});

Route::middleware('auth:manager')->group(function (){
    Route::post('/manager/logout',[ManagerController::class,'logout'])->name('managerLogout');
    // страницы
    Route::get('/manager/category',[CategoryController::class,'index'])->name('managerCategory');//категории
    Route::get('/manager/product',[ProductController::class,'index'])->name('managerProduct');//продукты
    Route::get('/manager/buyer',[CartController::class,'buyer'])->name('managerBuyer');//покупки
    Route::get('/manager/comment/{product}',[CommentController::class,'show'])->name('managerComment');//комментарии

    // функции с категориями
    Route::post('/manager/category/add',[CategoryController::class,'create'])->name('categoryCreate');
    Route::get('/manager/category/delete/{category}',[CategoryController::class,'delete'])->name('categoryDelete');
    Route::post('/manager/category/edit/{category}',[CategoryController::class,'edit'])->name('categoryEdit');

    // функции с продуктами
    Route::post('/manager/product/add',[ProductController::class,'create'])->name('productAdd');
    Route::get('/manager/product/delete/{product}',[ProductController::class,'delete'])->name('productDelete');
    Route::post('/manager/product/edit/{product}',[ProductController::class,'edit'])->name('productEdit');

    // функции с заявками на покупки
    Route::post('/manager/cart/{cart}/confirm',[CartController::class,'confirm'])->name('confirm');
    Route::post('/manager/cart/{cart}/failure',[CartController::class,'failure'])->name('failure');
    // функции с комментариями
    Route::get('/manager/comment/{product}/delete',[CommentController::class,'delete'])->name('commentDelete');
});

Route::middleware('auth:admin')->group(function (){
    Route::post('/admin/logout',[AdminController::class,'logout'])->name('adminLogout');

    // страницы
    Route::get('/admin/users',[AdminController::class,'users'])->name('adminUsers');//пользователи
    Route::get('/admin/managers',[AdminController::class,'managers'])->name('adminManagers');//менеджеры

    // функции с менеджерами
    Route::post('/admin/manager/add',[AdminController::class,'createManager'])->name('createManager');
    Route::get('/admin/manager/{manager}/delete',[AdminController::class,'deleteManager'])->name('deleteManager');

    // функции с пользователями
    Route::get('/admin/user/{user}/delete',[AdminController::class,'deleteUser'])->name('deleteUser');
});
