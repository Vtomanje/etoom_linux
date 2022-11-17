<?php

use App\Http\Livewire\Admin\MyPost;
use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Admin\EditProduct;
use App\Http\Livewire\Admin\ShowCategory;
use App\Http\Livewire\Admin\ShowProducts;

use App\Http\Livewire\Admin\CreateProduct;

use App\Http\Livewire\Admin\BrandComponent;
use App\Http\Livewire\Admin\ShowDepartment;
Use App\Http\Livewire\Admin\CityComponent;

use App\Http\Livewire\Admin\ExampleComponent;
use App\Http\Controllers\Admin\TestController;
use App\Http\Livewire\Admin\CreatePremiumImage;
use App\Http\Livewire\Admin\DepartmentComponent;
use App\Http\Controllers\Admin\PremiumController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\AdvertisingController;
use App\Http\Livewire\Admin\UsersType;

Route::get('/', ShowProducts::class)->middleware('admin')->name('admin.index');

/* users type */
Route::get('users-type',UsersType::class)->middleware('admin')->name('admin.users.type');

/* users */

Route::get('posts', MyPost::class)->name('admin.posts.index');

/* products */

Route::get('products/create', CreateProduct::class)->middleware('subscription')->name('admin.products.create');
Route::get('products/{product}/edit', EditProduct::class)->middleware('subscription')->name('admin.products.edit');
Route::get('products/{product}/delete', [ProductController::class, 'delete'])->middleware('subscription')->name('admin.products.delete');
Route::post('products/{product}/files', [ProductController::class, 'files'])->middleware('subscription')->name('admin.products.files');

/* categories */

Route::get('categories',[CategoryController::class,'index'])->name('admin.categories.index');
Route::get('categories/{category}', ShowCategory::class)->name('admin.categories.show');

/* states */

Route::get('departments', DepartmentComponent::class)->name('admin.departments.index');
Route::get('departments/{department}', ShowDepartment::class)->name('admin.departments.show');

/* cities */

Route::get('cities/{city}', CityComponent::class)->name('admin.cities.show');

/* premium */

Route::get('premium',[PremiumController::class,'index'])->middleware('premium')->name('admin.premium.index');
Route::get('premium/edit/{premiumImage}',[PremiumController::class,'edit'])->middleware('premium')->name('admin.premium.edit');
Route::get('premium/create',[PremiumController::class,'create'])->middleware('premium')->name('admin.premium.create');
Route::post('premium/store',[PremiumController::class,'store'])->middleware('premium')->name('admin.premium.store');
Route::post('premium/update/{premiumImage}',[PremiumController::class,'update'])->middleware('premium')->name('admin.premium.update');
Route::post('premium/delete/{premiumImage}',[PremiumController::class,'delete'])->middleware('premium')->name('admin.premium.delete');

/* advertising */
Route::get('/advertising/index',[AdvertisingController::class,'index'])->name('admin.advertising.index');
Route::get('/advertising/create',[AdvertisingController::class,'create'])->name('admin.advertising.create');
Route::post('/advertising/store',[AdvertisingController::class,'store'])->name('admin.advertising.store');
Route::get('/advertising/{premiumTestImage}/edit',[AdvertisingController::class,'edit'])->name('admin.advertising.edit');
Route::post('/advertising/{premiumTestImage}/update',[AdvertisingController::class,'update'])->name('admin.advertising.update');
Route::post('/advertising/{premiumTestImage}/delete',[AdvertisingController::class,'delete'])->name('admin.advertising.delete');





