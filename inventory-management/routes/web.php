<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\InventoriController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\Logout;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[LoginController::class, 'index']);
Route::post('/dashboard',[LoginController::class, 'login']);
Route::group(['middleware' => ['auth']], function () { 
    Route::get('/logout',[Logout::class, 'logout']);
    Route::get('/dashboard/inventori',[InventoriController::class, 'index']);
    Route::get('/dashboard/sales',[SalesController::class, 'index']);
    Route::get('/dashboard/purchase',[PurchaseController::class, 'index']);
});