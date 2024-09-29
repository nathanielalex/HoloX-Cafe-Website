<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\CartController;
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



Route::get('/home', [BarangController::class, 'homeIndex'])->name('home');
Route::get('/productPage', [BarangController::class, 'productPage'])->name('productPage');
// Route::get('/cart', [CartController::class, 'CartPage'])->name('cartPage'); 
Route::get('/login', [AuthController::class, 'loginPage'])->name('loginPage'); 
Route::post('/login', [AuthController::class, 'login'])->name('login'); 
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
//Route::get('/admin', [AuthController::class, 'adminPage'])->middleware('security');
Route::get('/admin', [BarangController::class, 'index'])->middleware('security');
//bisa tembak sblm login??? gbs kok?

Route::post('/barang', [BarangController::class, 'createBarang']);
Route::put('/barang', [BarangController::class, 'updateBarang']);
Route::delete('/barang/{id}', [BarangController::class, 'deleteBarang']);

Route::post('/addToCart/{id}', [CartController::class, 'addToCart']);
Route::get('/cart', [CartController::class, 'cartPage'])->name('cartPage');
Route::delete('/deleteFromCart/{id}', [CartController::class, 'deleteBarangFromCart']);

Route::get('/register', [AuthController::class, 'registerPage'])->name('registerPage');
Route::post('/register', [AuthController::class, 'createUser']);

// Route::get('add-to-cart/{id}', [BarangController::class, 'addToCart']);