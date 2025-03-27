<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StatiqueController;
use App\Http\Middleware\IsAdmin;

Route::get('/', [StatiqueController::class, 'index'])->name('home');


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
});
Route::middleware(['auth:sanctum','Isadmin'])->group(function () {//kay3ni blli khass tkoun connecté o admin bach t9der t'akhod l'accès l dashboard/admin.
    Route::get('dashboard/admin', [StatiqueController::class, 'dashboardAdmin'])->name('dashboard.admin');
});


