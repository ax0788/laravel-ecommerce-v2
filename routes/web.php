<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\User\WishlistController;
use App\Http\Controllers\User\CartPageController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\ShippingAreaController;

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





/////////// Auth Route Group ///////////
Route::group(['middleware' => 'auth'], function () {

    /////////// Admin Route Group ///////////
    Route::group(['middleware' => 'role:admin', 'prefix' => 'admin', 'as' => 'admin.'], function () {

        //   View Dashbaord
        Route::view('/dashboard', 'admin.dashboard')->name('dashboard');

        // Edit Profile
        Route::get('/profile/edit/{id}',  [App\Http\Controllers\Admin\ProfileController::class, 'edit'])->name('profile.edit');

        // Edit Password
        Route::view('/password/edit', 'admin.password.edit')->name('password.edit');

        // Brand CRUD Routes
        Route::resource('brands', BrandController::class);

        // Categories CRUD Routes
        Route::resource('categories', CategoryController::class);

        // AJAX url to get data for specific subcategory depending on category selected from dropdown options.
        Route::get('/products/create/ajax/{category_id}', [SubCategoryController::class, 'GetSubCategory']);

        // Product Status
        Route::get('/products/inactive/{id}', [ProductController::class, 'InactiveProduct'])->name('products.inactive');

        Route::get('/products/active/{id}', [ProductController::class, 'ActiveProduct'])->name('products.active');

        Route::post('products/thumbnail/update', [ProductController::class, 'UpdateThumbnail'])->name('products.update.thumbnail');

        Route::post('products/multi-image/update', [ProductController::class, 'UpdateMultiImage'])->name('products.update.multiImage');

        Route::get('products/mutliimage/delete/{id}', [ProductController::class, 'DeleteMultiImage'])->name('products.delete.multiImage');

        // SubCategories CRUD Routes
        Route::resource('subcategories', SubCategoryController::class);
        // Product Routes
        Route::resource('products', ProductController::class);


        //  Admin Coupon Routes
    Route::prefix('coupon')->group(function () {
    Route::get('/view', [CouponController::class, 'CouponView'])->name('manage-coupon');
    Route::post('/store', [CouponController::class, 'CouponStore'])->name('coupon.store');
    Route::get('/edit/{id}', [CouponController::class, 'CouponEdit'])->name('coupon.edit');
    Route::post('/update/{id}', [CouponController::class, 'CouponUpdate'])->name('coupon.update');
    Route::get('/delete/{id}', [CouponController::class, 'CouponDelete'])->name('coupon.delete');
});



//  Admin Shipping Area Routes
Route::prefix('shipping')->group(function () {
    // Shipping Country
    Route::get('/country/view', [ShippingAreaController::class, ' CountryIndex'])->name('manage-country');

    Route::post('/country/store', [ShippingAreaController::class, ' CountryStore'])->name('country.store');

    Route::get('/country/edit/{id}', [ShippingAreaController::class, ' CountryEdit'])->name('country.edit');

    Route::post('/country/update/{id}', [ShippingAreaController::class, ' CountryUpdate'])->name('country.update');

    Route::get('/country/delete/{id}', [ShippingAreaController::class, ' CountryDelete'])->name(' country.delete');

    // Shipping District
    Route::get('/state/view', [ShippingAreaController::class, 'StateView'])->name('state.index');

    Route::post('/state/store', [ShippingAreaController::class, 'StateStore'])->name('state.store');

    Route::get('/state/edit/{id}', [ShippingAreaController::class, 'StateEdit'])->name('state.edit');

    Route::post('/state/update/{id}', [ShippingAreaController::class, 'StateUpdate'])->name('state.update');

    Route::get('/state/delete/{id}', [ShippingAreaController::class, 'StateDelete'])->name('state.delete');

    // Shipping State
    Route::get('/district/view', [ShippingAreaController::class, 'DistrictView'])->name('district.index');

    Route::post('/district/store', [ShippingAreaController::class, 'DistrictStore'])->name('district.store');

    Route::get('/district/edit/{id}', [ShippingAreaController::class, 'DistrictEdit'])->name('district.edit');

    Route::post('/district/update/{id}', [ShippingAreaController::class, 'DistrictUpdate'])->name('district.update');

    Route::get('/district/delete/{id}', [ShippingAreaController::class, 'DistrictDelete'])->name('district.delete');
});



    });



/////////// User Routes Group ///////////

    // View Profile
    Route::get('/profile',  [App\Http\Controllers\User\ProfileController::class, 'index'])->name('profile.index');

    // Edit Profile
    Route::get('/profile/edit/{id}',  [App\Http\Controllers\User\ProfileController::class, 'edit'])->name('profile.edit');

    // Update Profile
    Route::post('/profile/update',  [App\Http\Controllers\User\ProfileController::class, 'update'])->name('profile.update');

    // Edit Password
    Route::view('/password/edit', 'user.profile.password.edit')->name('profile.password.edit');

    Route::get('/', [IndexController::class, 'index'])->name('home');

    Route::get('/product/details/{id}/{slug}', [IndexController::class, 'ProductDetails'])->name('product.details');

    // Product View Modal with AJAX
    Route::get('/product/view/modal/{id}', [IndexController::class, 'ProductViewAjax']);

   // Product Add to Cart Store DATA
    Route::post('/cart/data/store/{id}', [CartController::class, 'AddToCart']);

    // GET data from mini cart
     Route::get('/product/mini/cart', [CartController::class, 'AddMiniCart']);

     //Remove Item from mini cart
     Route::get('/product/minicart/remove/{rowId}', [CartController::class, 'RemoveMiniCart']);
      //Add to WishList
      Route::post('/add-to-wishlist/{product_id}', [CartController::class, 'AddToWishlist']);
      // Wishlist Page View
      Route::get('/wishlist', [WishlistController::class, 'ViewWishlist'])->name('wishlist.index');
      // Wishlist Page Load Data AJAX
      Route::get('/get-wishlist-product', [WishlistController::class, 'GetWishlistProduct']);
      // Wishlist Remove Product AJAX
      Route::get('/wishlist-remove/{id}', [WishlistController::class, 'RemoveWishlistProduct']);




});

//////////////// Guest Routes/////////////////////////////////
     /////// View Cart Page/////////////
    Route::get('/mycart', [CartPageController::class, 'MyCart'])->name('cart.index');
    //  GET Cart Products
    Route::get('/get-cart-product', [CartPageController::class, 'GetCartProduct']);
    // Remove  Cart Products
    Route::get('/cart-remove/{rowId}', [CartPageController::class, 'RemoveCartProduct']);
    // Increment Cart Item
    Route::get('/cart-increment/{rowId}', [CartPageController::class, 'CartIncrement']);
    // Decrement Cart Item
    Route::get('/cart-decrement/{rowId}', [CartPageController::class, 'CartDecrement']);

    /////Frontend Apply & Remove Coupon
    Route::post('/coupon-apply', [CartController::class, 'CouponApply']);
    Route::get('/coupon-cal', [CartController::class, 'CouponCal']);
    Route::get('/coupon-remove', [CartController::class, 'CouponRemove']);

    //  Admin Coupon Routes
    Route::prefix('coupon')->group(function () {
    Route::get('/view', [CouponController::class, 'CouponView'])->name('manage-coupon');
    Route::post('/store', [CouponController::class, 'CouponStore'])->name('coupon.store');
    Route::get('/edit/{id}', [CouponController::class, 'CouponEdit'])->name('coupon.edit');
    Route::post('/update/{id}', [CouponController::class, 'CouponUpdate'])->name('coupon.update');
    Route::get('/delete/{id}', [CouponController::class, 'CouponDelete'])->name('coupon.delete');
});





     /////// Checkout Routes/////////////
     Route::get('/checkout', [CartController::class, 'CheckoutCreate'])->name('checkout.index');

    // Checkout View Page Responsive form-group Selection w/ AJAX
    Route::get('/district-get/ajax/{division_id}', [CheckoutController::class, 'DistrictGetAjax']);

    Route::get('/state-get/ajax/{district_id}', [CheckoutController::class, 'StateGetAjax']);

    // Checkout Store
    Route::post('/checkout/store', [CheckoutController::class, 'CheckoutStore'])->name('checkout.store');