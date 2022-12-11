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

Route::get('/', function () {
    return view('welcome');
});

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

    Route::get('/home', [IndexController::class, 'index'])->name('home');
    Route::get('/product/details/{id}/{slug}', [IndexController::class, 'ProductDetails'])->name('product.details');

    // Product View Modal with AJAX
    Route::get('/product/view/modal/{id}', [IndexController::class, 'ProductViewAjax']);

   // Product Add to Cart Store DATA
    Route::post('/cart/data/store/{id}', [CartController::class, 'AddToCart']);

    // GET data from mini cart
     Route::get('/product/mini/cart', [CartController::class, 'AddMiniCart']);

     //Remove Item from mini cart
     Route::get('/product/minicart/remove/{rowId}', [CartController::class, 'RemoveMiniCart']);

      // Wishlist Page View
      Route::get('/wishlist', [WishlistController::class, 'ViewWishlist'])->name('wishlist');
      // Wishlist Page Load Data AJAX
      Route::get('/get-wishlist-product', [WishlistController::class, 'GetWishlistProduct']);
      // Wishlist Remove Product AJAX
      Route::get('/wishlist-remove/{id}', [WishlistController::class, 'RemoveWishlistProduct']);

});

// Guest Routes
/* Route::view('/home', 'user.home')->name('home'); */

    //Add to WishList
    Route::post('/add-to-wishlist/{product_id}', [CartController::class, 'AddToWishlist']);