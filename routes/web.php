<?php

use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\ProductTrackController;
use App\Http\Controllers\Frontend\UserMessageController;
use App\Http\Controllers\Frontend\UserOrderController;
use App\Http\Controllers\Frontend\UserSellerRequestController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Backend\SellerController;

use App\Http\Controllers\Frontend\UserAddressController;
use App\Http\Controllers\Frontend\UserProfileController;
use App\Http\Controllers\Frontend\UserDashboardController;
use App\Http\Controllers\Frontend\FrontendProductController;
use App\Http\Controllers\Frontend\PaymentController;
use App\Http\Controllers\Frontend\CheckOutController;

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

Route::get('/', [HomeController::class,'index'])->name('home');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
// ---------------
// admin login

Route::get('admin/login',[AdminController::class, 'login'])->name('admin.login');
// contact
Route::get('contact',[PageController::class, 'contact'])->name('contact');
Route::post('contact',[PageController::class, 'handleContactForm'])->name('handle-contact-form');
// terms and conditions
Route::get('terms-and-condtions',[PageController::class, 'termsAndCondition'])->name('terms-and-conditions');




// user
Route::group(['middleware' => ['auth','verified'], 'prefix' => 'user', 'as' => 'user.'], function(){
    Route::get('dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
    Route::get('profile', [UserProfileController::class,'index'])->name('profile');
    Route::put('profile',[UserProfileController::class,'updateProfile'])->name('profile.update');
    Route::post('profile',[UserProfileController::class,'updatePassword'])->name('profile.update.password');

    // address
    Route::resource('address', UserAddressController::class);

    // check out
    Route::get('checkout', [CheckOutController::class, 'index'])->name('checkout');
    Route::post('checkout/create-address', [CheckOutController::class, 'createAddress'])->name('checkout.create-address');
    Route::post('checkout/form-submit', [CheckOutController::class, 'checkOutFormSubmit'])->name('checkout.form-submit');

    //payment
    Route::get('payment', [PaymentController::class, 'index'])->name('payment');
    // suscessful payment
    Route::get('payment-success', [PaymentController::class, 'paymentSuccess'])->name('payment.success');
    // paypal routes
    Route::get('paypal/payment', [PaymentController::class, 'payWithPaypal'])->name('paypal.payment');
    // paypal success
    Route::get('paypal/success', [PaymentController::class, 'paypalSuccess'])->name('paypal.success');
    // paypal fail
    Route::get('paypal/cancel', [PaymentController::class, 'paypalCancel'])->name('paypal.cancel');
    //cod
    Route::get('cod/payment', [PaymentController::class, 'codPayment'])->name('cod.payment');

    // order routes
    Route::get('orders',[UserOrderController::class, 'index'])->name('orders');
    Route::get('orders/show/{id}',[UserOrderController::class, 'show'])->name('orders.show');

    // request to be a seller
    Route::get('seller-request',[UserSellerRequestController::class, 'index'])->name('seller-request');
    Route::post('seller-request',[UserSellerRequestController::class, 'create'])->name('seller-request.create');

    // message
    Route::get('messages',[UserMessageController::class, 'index'])->name('message.index');

    // message at modal
    Route::post('send-message',[UserMessageController::class, 'sendMessage'])->name('send-message');
    Route::get('get-messages',[UserMessageController::class, 'getMessages'])->name('get-messages');

});

// product frontend

Route::get('product-detail/{slug}', [FrontendProductController::class,'showProduct'])->name('product-detail');

// cart

Route::post('add-to-cart', [CartController::class,'addToCart'])->name('add-to-cart');
Route::get('cart-details', [CartController::class,'cartDetails'])->name('cart-details');

Route::post('cart/update-quantity', [CartController::class,'updateProductQty'])->name('cart.update-quantity');
Route::get('clear-quantity', [CartController::class,'clearCart'])->name('clear.cart');
Route::get('cart/remove-product/{rowId}', [CartController::class,'removeProduct'])->name('cart.remove-product');
Route::get('cart-count', [CartController::class,'getCartCount'])->name('cart-count');
Route::get('cart-products', [CartController::class,'getCartProducts'])->name('cart-products');
Route::post('cart/remove-sidebar-product', [CartController::class,'removeSideBarProduct'])->name('cart.remove-sidebar-products');
Route::get('cart/sidebar-product-total', [CartController::class,'cartTotal'])->name('cart.sidebar-products-total');

// seller

Route::group(['middleware' => ['auth','verified'], 'prefix' => 'seller', 'as' => 'seller.'], function(){
Route::get('dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
});

// track porduct order
Route::get('product-tracking', [ProductTrackController::class, 'index'])->name('product-tracking.index');





