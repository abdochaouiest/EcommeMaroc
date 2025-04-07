<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StatiqueController;

Route::get('/', [StatiqueController::class, 'index'])->name('home');
Route::prefix("index")->group(function(){
    Route::get('show/{id}', [StatiqueController::class, 'show'])->name('index.show');
});

Route::get('aboutus', [StatiqueController::class, 'aboutUs'])->name('aboutus');
Route::get('contactUs', [StatiqueController::class, 'contactUs'])->name('contactus');
Route::get('services', [StatiqueController::class, 'services'])->name('services');
Route::get('shop', [StatiqueController::class, 'shop'])->name('shop');

Route::controller(AuthController::class)->group( function (){
    Route::get('register','register')->name('register');
    Route::post('register','registerSave')->name('register.save');
    Route::get('login','login')->name('login');
    Route::post('login','loginAction')->name('login.action');
    Route::get('logout','logout')->middleware('auth:sanctum')->name('logout');
    
});

Route::middleware(['auth:sanctum'])->group(function () {// kay3ni blli ay wahed khaso ykoon connecté (authenticité) bach y9der ymchi l dashboard dyal user
    Route::get('dashboard/{user}', [StatiqueController::class, 'dashboardUser'])->name('dashboard.user')->where([
        'user' => "[0-9]+"
    ]);

    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::put('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove/{cartItem}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
});
Route::middleware(['auth:sanctum','Isadmin'])->group(function () {//kay3ni blli khass tkoun connecté o admin bach t9der t'akhod l'accès l dashboard/admin.
    Route::get('dashboard/admin', [StatiqueController::class, 'dashboardAdmin'])->name('dashboard.admin');

    Route::controller(ProductController::class)->prefix('products')->group(function(){
        Route::get('','index')->name('products');
        Route::get('create','create')->name('products.create');
        Route::post('store','store')->name('products.store');
        Route::get('show/{id}','show')->name('products.show');
        Route::get('edit/{id}', 'edit')->name('products.edit');
        Route::put('edit/{id}', 'update')->name('products.update');
        Route::delete('destroy/{id}', 'destroy')->name('products.destroy');
    });
    
});


