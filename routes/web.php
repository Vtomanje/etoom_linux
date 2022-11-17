<?php

use Illuminate\Http\Request;
use App\Http\Livewire\Weather;
use App\Http\Livewire\ShoppingCart;
use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\SearchController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdvertisingController;

Route::get('/', HomeController::class)->name('home');
Route::get('search', SearchController::class)->name('search');
Route::get('categories', [CategoryController::class, 'index'])->name('categories');
Route::get('categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('products/{product}', [ProductController::class, 'show'])->middleware('published')->name('products.show');

//Route::get('shopping-cart', ShoppingCart::class)->name('shopping-cart');  pendiente para ghacer

/* advertising */

Route::get('/advertisings',[AdvertisingController::class,'index'])->name('advertising.index');

/* billing */

Route::get('billing', [BillingController::class, 'index'])->middleware('auth')->name('billing.index');

/* billing premium */

Route::get('billing-premium', [BillingController::class, 'premium'])->middleware('auth')->name('billing.premium');
 
/* ruta para descargar facturas */

Route::get('/user/invoice/{invoice}', function (Request $request, $invoiceId) {
    return $request->user()->downloadInvoice($invoiceId);
});


/* weather */

Route::get('weather',Weather::class)->name('weather');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});




    

