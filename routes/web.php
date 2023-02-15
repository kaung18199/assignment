<?php

use App\Http\Controllers\Ajax\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
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
    return view('login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard',[AuthController::class,'loginSystem'])->name('dashboard');

    Route::prefix('category')->group(function(){
        Route::get('/list',[CategoryController::class,'list'])->name('category#list');
        Route::get('/create',[CategoryController::class,'createPage'])->name('category#createPage');
        Route::post('/create',[CategoryController::class,'create'])->name('category#create');
        Route::get('delete/{id}',[CategoryController::class,'delete'])->name('category#delete');
        Route::get('edit/{id}',[CategoryController::class,'edit'])->name('category#edit');
        Route::post('edit',[CategoryController::class,'editFun'])->name('category#editFun');
    });

    Route::prefix('item')->group(function(){
        Route::get('/createPage',[ItemController::class,'createPage'])->name('item#createPage');
        Route::post('/createitem',[ItemController::class,'createItem'])->name('item#createItem');
        Route::get('delete/{id}',[ItemController::class,'delete'])->name('item#delete');
        Route::get('edit/{id}',[ItemController::class,'editPage'])->name('item#edit');
        Route::post('edit',[ItemController::class,'edit'])->name('item#editItem');
    });

    Route::prefix('home')->group(function(){
        Route::get('/home',[HomeController::class,'homePage'])->name('home#page');
        Route::get('/shop',[HomeController::class,'shopPage'])->name('home#shopPage');
        Route::get('/detail/{id}',[HomeController::class,'detail'])->name('home#detail');
    });

    //ajax
    Route::get('category/row/select',[DashboardController::class,'categoryRow']);
    Route::get('item/row/select',[DashboardController::class,'itemRow']);
});
