<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AjaxBOOKCRUDController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[ProductController::class,'index']);
Route::post('/add-product',[ProductController::class,'store'])->name('product-add');
Route::get('/all-product',[ProductController::class,'allData']);
Route::get('/product/edit/{id}',[ProductController::class,'edit']);

Route::post('/product/edit/{id}',[ProductController::class,'updateP']);
Route::get('/product/delete/{id}',[ProductController::class,'deleteP']);


Route::get('ajax-book-crud', [AjaxBOOKCRUDController::class, 'index']);
Route::post('add-update-book', [AjaxBOOKCRUDController::class, 'store']);
Route::post('edit-book', [AjaxBOOKCRUDController::class, 'edit']);
Route::post('delete-book', [AjaxBOOKCRUDController::class, 'destroy']);
