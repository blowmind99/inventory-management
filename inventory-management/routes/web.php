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
Route::get('/test',[InventoriController::class, 'test']);
Route::get('/dashboard', [LoginController::class, 'dashboard']); 
Route::group(['middleware' => ['auth']], function () {
    Route::get('/logout',[Logout::class, 'logout']);
    Route::get('/dashboard/purchase',[PurchaseController::class, 'index']);
});

// inventori
Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard/inventori',[InventoriController::class, 'index']);
    Route::get('/dashboard/inventori/edit/{id}',[InventoriController::class, 'edit']);
    Route::post('/dashboard/inventori/edit/{id}',[InventoriController::class, 'update']);
    Route::post('/dashboard/inventori/delete/{id}',[InventoriController::class, 'destroy']);
    Route::get('/dashboard/inventori/create', [InventoriController::class, 'create']);
    Route::post('/dashboard/inventori/add', [InventoriController::class, 'store']);
});
// end inventori

// sales
Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard/sales',[SalesController::class, 'index']);
    Route::get('/dashboard/sales/edit/{id}',[SalesController::class, 'edit']);
    Route::post('/dashboard/sales/edit/{id}',[SalesController::class, 'update']);
    Route::post('/dashboard/sales/delete/{id}',[SalesController::class, 'destroy']);
    Route::get('/dashboard/sales/create', [SalesController::class, 'create']);
    Route::post('/dashboard/sales/add', [SalesController::class, 'store']);
});
// end sales

// purchase
Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard/purchase',[PurchaseController::class, 'index']);
    Route::get('/dashboard/purchase/edit/{id}',[PurchaseController::class, 'edit']);
    Route::post('/dashboard/purchase/edit/{id}',[PurchaseController::class, 'update']);
    Route::post('/dashboard/purchase/delete/{id}',[PurchaseController::class, 'destroy']);
    Route::get('/dashboard/purchase/create', [PurchaseController::class, 'create']);
    Route::post('/dashboard/purchase/add', [PurchaseController::class, 'store']);
});
// end purchase

// api get price
Route::group(['middleware' => ['auth']], function (){
    Route::get('/get-item-price', [InventoriController::class, 'get_price']);
});
// end api get price