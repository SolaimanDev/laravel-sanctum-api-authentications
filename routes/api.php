<?php
use App\Http\Controllers\ApiProductController;
use App\Http\Controllers\ApiOrderController;
use App\Http\Controllers\AuthController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/products', [ApiProductController::class, 'index']);
Route::get('/products/{id}', [ApiProductController::class, 'show']);
Route::get('/products/search/{name}', [ApiProductController::class, 'search']);

 Route::get('/product-order', [ApiOrderController::class, 'index']);
 Route::post('/product-order', [ApiOrderController::class, 'store']);
 
// Protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/products', [ApiProductController::class, 'store']);
    Route::put('/products/{id}', [ApiProductController::class, 'update']);
    Route::delete('/products/{id}', [ApiProductController::class, 'destroy']);
    Route::post('/logout', [AuthController::class, 'logout']);
   
   
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
