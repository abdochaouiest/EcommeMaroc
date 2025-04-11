<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
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


    Route::get('/profile', [ProfileController::class, 'show'])->name('profil.show');
    Route::put('/profile', [ProfileController::class, 'updateProfile'])->name('profil.update');
    Route::post('/profile', [ProfileController::class, 'updatePassword'])->name('profil.updatepassword');
    
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::put('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove/{cartItem}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');

Route::get('/product/{id}', [ProductController::class, 'showUser'])->name('product.showuser');


Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::get('/paypal/success', [PayPalController::class, 'handleSuccess'])
            ->name('paypal.success');

Route::get('/paypal/cancel', [PayPalController::class, 'handleCancel'])
            ->name('paypal.cancel');
Route::get('/payment/error', function () {
                return view('payment.error')->with('error', session('error'));
            })->name('payment.error');


Route::get('/order/confirmation/{order}', function ($order) {
    return view('payment.orderconfirmation', [
        'order' => $order,
        'success' => session('success')
    ]);
})->name('order.confirmation');

Route::post('/paypal/create', [PaypalController::class, 'createPayment'])->name('paypal.create');

Route::get('/orders', [OrderController::class, 'index'])->name('orders');
Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');

});
Route::middleware(['auth:sanctum','Isadmin'])->group(function () {//kay3ni blli khass tkoun connecté o admin bach t9der t'akhod l'accès l dashboard/admin.
    Route::get('/admin/dashboard', [StatiqueController::class, 'dashboardAdmin'])->name('dashboard.admin');
    Route::get('/admin/dashboard/customers/{id}', [StatiqueController::class, 'getCustomerDetails'])
    ->name('admin.customers.details');

    Route::get('/admin/dashboard/orders/{order}', [StatiqueController::class, 'showordersdetails'])->name('orders.showadmin');
    Route::put('/admin/dashboard/orders/delete/{order}', [StatiqueController::class, 'cancel'])->name('orders.cancel');

    Route::controller(ProductController::class)->prefix('products')->group(function(){
        Route::get('','index')->name('products');
        Route::get('create','create')->name('products.create');
        Route::post('store','store')->name('products.store');
        Route::get('edit/{id}', 'edit')->name('products.edit');
        Route::put('edit/{id}', 'update')->name('products.update');
        Route::delete('destroy/{id}', 'destroy')->name('products.destroy');
    });
    
});


