<?php
use App\Http\Controllers\Backend\SellerMessageController;
use App\Http\Controllers\Backend\SellerOrderController;
use App\Http\Controllers\Backend\SellerProductController;
use App\Http\Controllers\Backend\SellerProductImageGalleryController;
use App\Http\Controllers\Backend\SellerShopProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\SellerController;
use App\Http\Controllers\Backend\SellerProfileController;
use function PHPUnit\Framework\assertDirectoryDoesNotExist;


// seller routes

Route::get('dashboard',[SellerController::class, 'dashboard'])->name('dashboard');
Route::get('profile', [SellerProfileController::class,'index'])->name('profile');
// dissaproved products
Route::get('disapproved-products',[SellerProductController::class, 'disapproveProducts'])->name('disapproved-products');
// transaction
Route::get('transaction',[SellerProductController::class, 'transaction'])->name('transaction.index');
Route::get('transaction/filter', [SellerProductController::class, 'filter'])->name('transaction.filter');

Route::put('profile',[SellerProfileController::class,'updateProfile'])->name('profile.update');
Route::post('profile',[SellerProfileController::class,'updatePassword'])->name('profile.update.password');
Route::put('change-product-status', [SellerProductController::class, 'changeStatus'])->name('product.change-product-status');
// seller shop

Route::resource('seller-profile', SellerShopProfileController::class);

// seller product
Route::get('create-product/with-ai', [SellerProductController::class, 'createWithAi'])->name('create-product.with-ai');
Route::post('store-with-ai', [SellerProductController::class, 'storeWithAI'])->name('store-with-ai');
// disapproved products
Route::get('edit-disapproved-products/{id}', [SellerProductController::class,'editDisapprovedProducts'])->name('edit-disapproved-products');
Route::put('update-disapproved-products/{id}', [SellerProductController::class,'updateDisapprovedProducts'])->name('update-disapproved-products');


Route::resource('products', SellerProductController::class);


// gallery
Route::resource('products-image-gallery', SellerProductImageGalleryController::class);

// orders
Route::get('orders',[SellerOrderController::class, 'index'])->name('orders');
Route::get('orders/show/{id}',[SellerOrderController::class, 'show'])->name('orders.show');
Route::get('orders/status/{id}',[SellerOrderController::class, 'orderStatus'])->name('orders.status');

// message
Route::get('messages',[SellerMessageController::class, 'index'])->name('message.index');
Route::post('send-message',[SellerMessageController::class, 'sendMessage'])->name('send-message');
    Route::get('get-messages',[SellerMessageController::class, 'getMessages'])->name('get-messages');

