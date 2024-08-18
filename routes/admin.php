<?php
use App\Http\Controllers\Backend\CodSettingController;
use App\Http\Controllers\Backend\MessageController;
use App\Http\Controllers\Backend\CustomerListController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\SellerListController;
use App\Http\Controllers\Backend\SellerRequestController;
use App\Http\Controllers\Backend\TermsAndConditionController;
use App\Http\Controllers\Backend\TransactionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\FlashSaleController;
use App\Http\Controllers\Backend\ShippingRuleController;
use App\Http\Controllers\Backend\PaypalSettingController;
use App\Http\Controllers\Backend\PaymentSettingController;
use App\Http\Controllers\Backend\SellerSProductController;
use function PHPUnit\Framework\assertDirectoryDoesNotExist;
use App\Http\Controllers\Backend\AdminSellerProfileController;
use App\Http\Controllers\Backend\ProductImageGalleryController;


// admin routes
Route::get('dashboard',[AdminController::class, 'dashboard'])->name('dashboard');
// profile
Route::get('profile',[ProfileController::class, 'index'])->name('profile');
Route::post('profile/update',[ProfileController::class, 'updateProfile'])->name('profile.update');
Route::post('profile/update/password',[ProfileController::class, 'updatePassword'])->name('password.update');



// slider
Route::resource('slider', SliderController::class);

// category route
//register new router before resource controller
Route::put('change-status', [CategoryController::class, 'changeStatus'])->name('category.change-status');
Route::resource('category', CategoryController::class);

// seller profile routes
Route::resource('seller-profile', AdminSellerProfileController::class);

// product routes
Route::put('change-product-status', [ProductController::class, 'changeStatus'])->name('product.change-product-status');
Route::put('change-feature', [ProductController::class, 'changeFeature'])->name('product.change-feature');
Route::get('product/get-categories',[ProductController::class,'getCategories'])->name('product.get-categories');
Route::resource('products', ProductController::class);
Route::resource('products-image-gallery', ProductImageGalleryController::class);


// seller's product
Route::get('sellers-products',[SellerSProductController::class, 'index'])->name('sellers-product.index');
// pending
Route::get('pending-products',[SellerSProductController::class, 'pendingProducts'])->name('pending-product.index');
// disapproved
Route::get('disapproved-products',[SellerSProductController::class, 'disapprovedProducts'])->name('disapproved-product.index');
Route::get('disapproved-products-remarks/{id}',[SellerSProductController::class, 'disapprovedProductsRemark'])->name('disapproved-product.remark');
Route::post('product-remark/{productId}',[SellerSProductController::class, 'productRemark'])->name('product-remark');

// change product status
Route::put('change-approve-status',[SellerSProductController::class, 'changeApproveStatus'])->name('change-approve-status');





// flash sell routes

Route::get('flash-sale', [FlashSaleController::class,'index'])->name('flash-sale.index');
Route::put('flash-sale', [FlashSaleController::class,'update'])->name('flash-sale.update');
Route::post('flash-sale/add-product', [FlashSaleController::class,'addProduct'])->name('flash-sale.add-product');
Route::put('flash-sale/show-at-home/change-status', [FlashSaleController::class,'changeShowAtHomeStatus'])->name('flash-sale.show-at-home.change-status');
Route::put('flash-sale/change-status',[FlashSaleController::class, 'changeStatus'])->name('flash-sale.change-status');
Route::delete('flash-sale/{id}',[FlashSaleController::class, 'destroy'])->name('flash-sale.destroy');

// Shipping
Route::put('shipping-rule/change-status', [ShippingRuleController::class, 'changeStatus'])->name('shipping-rule.change-status');
Route::resource('shipping-rule', ShippingRuleController::class);

// order
Route::get('order-status', [OrderController::class, 'changeOrderStatus'])->name('order.status');
Route::get('payment-status', [OrderController::class, 'changePaymentStatus'])->name('payment.status');

Route::get('pending-orders', [OrderController::class, 'pendingOrders'])->name('pending-orders');
Route::get('processed-orders', [OrderController::class, 'processedOrders'])->name('processed-orders');
Route::get('dropped-off-orders', [OrderController::class, 'droppedOffOrders'])->name('dropped-off-orders');
Route::get('shipped-orders', [OrderController::class, 'shippedOrders'])->name('shipped-orders');
Route::get('out-for-delivery-orders', [OrderController::class, 'outForDelivery'])->name('out-for-delivery-orders');
Route::get('delivered-orders', [OrderController::class, 'deliveredOrders'])->name('delivered-orders');
Route::get('cancelled-orders', [OrderController::class, 'cancelledOrders'])->name('cancelled-orders');
Route::resource('order', OrderController::class);

//order transaction
Route::get('transaction', [TransactionController::class, 'index'])->name('transaction');
Route::get('transaction/filter', [TransactionController::class, 'filter'])->name('transaction.filter');

// setting
Route::get('settings', [SettingController::class,'index'])->name('settings.index');
Route::put('general-setting-update', [SettingController::class,'generalSettingUpdate'])->name('general-setting-update');
Route::put('email-setting-update', [SettingController::class,'emailConfigSettingUpdate'])->name('email-setting-update');
Route::put('pusher-setting-update', [SettingController::class,'pusherSettingUpdate'])->name('pusher-setting-update');




// payment setting
Route::get('payment-setting', [PaymentSettingController::class, 'index'])->name('payment-setting.index');
Route::put('cod-settings/{id}', [CodSettingController::class, 'update'])->name('cod-setting.ipdate');
Route::resource('paypal-setting', PaypalSettingController::class);

// selller request
Route::get('seller-request',[ SellerRequestController::class, 'index'])->name('seller-request.index');
Route::get('seller-request/{id}/show',[ SellerRequestController::class, 'show'])->name('seller-request.show');
Route::put('seller-request/{id}/change-status',[ SellerRequestController::class, 'changeStatus'])->name('seller-request.change-status');

// Regular User list
Route::get('customers',[ CustomerListController::class, 'index'])->name('customers.index');
Route::put('customers/status-change',[ CustomerListController::class, 'changeStatus'])->name('customers.status-change');

// Seller User list
Route::get('seller',[ SellerListController::class, 'index'])->name('seller.index');
Route::put('seller/status-change',[ SellerListController::class, 'changeStatus'])->name('customers.status-change');

// message
// message
Route::get('messages',[MessageController::class, 'index'])->name('message.index');
Route::get('get-messages',[MessageController::class, 'getMessages'])->name('get-messages');
Route::post('send-message',[MessageController::class, 'sendMessage'])->name('send-message');

// Terms and Conditions
Route::get('terms-and-conditions',[TermsAndConditionController::class, 'index'])->name('terms-and-conditions');
Route::put('terms-and-conditions/update',[TermsAndConditionController::class, 'update'])->name('terms-and-conditions.update');
