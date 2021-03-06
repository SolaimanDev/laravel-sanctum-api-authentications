<?php
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
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

Auth::routes();
Route::resource('product', ProductController::class);
Route::get('/order-list', [OrderController::class,'index']);
Route::get('/order-change/{status}/{id}', [OrderController::class,'changeStatus']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('role');
