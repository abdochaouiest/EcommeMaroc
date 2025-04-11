<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StatiqueController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\IsAdmin;


//hadshi li drt ana 



Route::get('/admin/users', [UserController::class, 'index'])->name('user-management.index'); // Liste des utilisateurs
Route::get('/admin/users/{user}', [UserController::class, 'show'])->name('user-management.show');
Route::get('/admin/users/{user}/details', [UserController::class, 'details']);
Route::post('admin/users/{user}/ban-toggle', [UserController::class, 'toggleBan'])->name('user-management.ban-toggle');
Route::post('/admin/users/{user}/reset-password', [UserController::class, 'resetPassword']);
Route::get('/admin/users/{user}/orders', [UserController::class, 'orderHistory'])->name('user-management.orders');



Route::get('/', [StatiqueController::class, 'index']);
Route::prefix("index")->group(function () {
    Route::get('show/{id}', [StatiqueController::class, 'show'])->name('index.show');
});


Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');
    Route::get('logout', 'logout')->middleware('auth:sanctum')->name('logout');
});

Route::middleware(['auth:sanctum', 'CheckIfBanned'])->group(function () { // kay3ni blli ay wahed khaso ykoon connecté (authenticité) bach y9der ymchi l dashboard dyal user
    Route::get('dashboard/{user}', [StatiqueController::class, 'dashboardUser'])->name('dashboard.user')->where([
        'user' => "[0-9]+"
    ]);
});
Route::middleware(['auth:sanctum', 'Isadmin'])->group(function () { //kay3ni blli khass tkoun connecté o admin bach t9der t'akhod l'accès l dashboard/admin.
    Route::get('dashboard/admin', [StatiqueController::class, 'dashboardAdmin'])->name('dashboard.admin');

    Route::controller(ProductController::class)->prefix('products')->group(function () {
        Route::get('', 'index')->name('products');
        Route::get('create', 'create')->name('products.create');
        Route::post('store', 'store')->name('products.store');
        Route::get('show/{id}', 'show')->name('products.show');
        Route::get('edit/{id}', 'edit')->name('products.edit');
        Route::put('edit/{id}', 'update')->name('products.update');
        Route::delete('destroy/{id}', 'destroy')->name('products.destroy');
    });
});
