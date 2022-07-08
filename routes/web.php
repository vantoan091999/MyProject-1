<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\admin\ProductController;
use PhpParser\Node\Stmt\Catch_;

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

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'checklogin']);
Route::get('/registration', [UserController::class, 'registration'])->name('registration');
Route::post('/registration', [UserController::class, 'store']);
 
#home
Route::get('home', [UserController::class, 'index'])->name('home');

Route::prefix('/admin')->group(function ()
{
  Route::get('/', [AdminController::class, "index"])->name('admin');
    #categoey
    Route::prefix('/category')->group(function (){

            Route::get('/add', [CategoryController::class, 'add'])->name('category-add');
            Route::post('/add', [CategoryController::class, 'create']);
            Route::get('/list', [CategoryController::class, 'list'])->name('category-list');
            Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category-edit');
            Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('category-delete');
            Route::post('/update/{id}', [CategoryController::class, 'update']);
            Route::get('/active/{id}', [CategoryController::class, 'active'])->name('category-active');
    });

    #brand
    Route::prefix('/brand')->group(function () {
        Route::get('/add', [BrandController::class, 'add'])->name('brand-add');
        Route::post('/add', [BrandController::class, 'create']);
        Route::get('/list', [BrandController::class, 'list'])->name('brand-list');
        Route::get('/edit/{id}', [BrandController::class, 'show'])->name('brand-edit');
        Route::get('/delete/{id}', [BrandController::class, 'delete'])->name('brand-delete');
        Route::post('/update/{id}', [BrandController::class, 'update']);
        Route::get('/active/{id}', [BrandController::class, 'active'])->name('brand-active');
    });
     #product
     Route::prefix('/product')->group(function () {
        Route::get('/add', [ProductController::class, 'add'])->name('product-add');
        Route::post('/add', [ProductController::class, 'create']);
        Route::get('/list', [ProductController::class, 'list'])->name('product-list');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product-edit');
        Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('product-delete');
        Route::post('/update/{id}', [ProductController::class, 'update']);
        Route::get('/active/{id}', [ProductController::class, 'active'])->name('product-active');
        Route::get('/{id}', [ProductController::class, 'detail'])->name('product-details');
    }); 

});