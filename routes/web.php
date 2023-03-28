<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\UserController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Front\OrderController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Front\RatingController;
use App\Http\Controllers\Front\ReviewController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Front\ProfileController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Front\CheckoutController;
use App\Http\Controllers\Front\WishlistController;
use App\Http\Controllers\Admin\DashboardController;

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
//Frontend route
Route::get('/', [FrontController::class, 'home'])->name('front');
Route::post('/search', [FrontController::class, 'search'])->name('search');
Route::get('category/{slug}', [FrontController::class, 'product_by_category'])->name('category.product');
Route::get('brand/{slug}', [FrontController::class, 'product_by_brand'])->name('brand.product');
Route::get('product/price/high-to-low',[FrontController::class, 'product_by_price_high_to_low'])->name('product.price.high-to-low');
Route::get('product/price/low-to-high',[FrontController::class, 'product_by_price_low_to_high'])->name('product.price.low-to-high');
Route::get('product-details/{category_slug}/{product_slug}',[FrontController::class, 'product_details'])->name('product.details');
Route::get('wishlist/{id}',[WishlistController::class, 'wishlist'])->name('product.wishlist');
Route::post('add-to-cart',[CartController::class, 'add_cart']);
Route::get('cart-item-count',[CartController::class, 'court_count']);
Route::middleware(['auth'])->group(function(){
    //wishlist
    Route::get('wishlist-view',[WishlistController::class, 'wishlist_view'])->name('product.wishlist_view');
    Route::get('wishlist/delete/{id}',[WishlistController::class, 'wishlist_delete'])->name('product.wishlist_delete');
    //cart
    Route::get('cart', [CartController::class, 'cart'])->name('cart');
    Route::get('cart-delete/{id}', [CartController::class, 'cart_delete'])->name('cart.destroy');
    Route::post('cart-qty-update', [CartController::class, 'cart_update'])->name('cart.update');
     //checkout
     Route::get('checkout', [CheckoutController::class, 'checkout'])->name('checkout');
     Route::post('place-order', [OrderController::class, 'place_order'])->name('place.order');
     //order
     Route::get('my-order', [UserController::class, 'my_order'])->name('my.order');
     //order
     Route::get('order-details/{id}', [UserController::class, 'order_details'])->name('order.details');
     //thank you
     Route::get('thank-you', [UserController::class, 'thank_you'])->name('thank_you');
     //profile
     Route::get('profile', [ProfileController::class, 'profile'])->name('profile');
     Route::post('profile', [ProfileController::class, 'profile_store'])->name('profile.store');
     Route::get('user-password', [ProfileController::class, 'user_password'])->name('user.password');
     Route::post('user-password-change', [ProfileController::class, 'user_password_change'])->name('user.password.change');
    //rating
    Route::post('rating-store', [RatingController::class, 'store_rating'])->name('rating.store');
    //review
    Route::post('store-review', [ReviewController::class, 'store_review'])->name('store.review');
});

Route::get('latest_product', [FrontController::class, 'latest'])->name('latest.product');
Route::get('all-product', [FrontController::class, 'all_product'])->name('all.product');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::as('admin.')->middleware(['auth','isAdmin'])->prefix('admin/')->group(function(){
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    //users
    Route::get('users', [DashboardController::class, 'users'])->name('users');
    Route::get('users-create', [DashboardController::class, 'user_create'])->name('user.create');
    Route::post('users-store', [DashboardController::class, 'user_store'])->name('user.store');
    Route::get('users-edit/{id}', [DashboardController::class, 'user_edit'])->name('user.edit');
    Route::put('users-update/{id}', [DashboardController::class, 'user_update'])->name('user.update');
    Route::delete('users-destroy/{id}', [DashboardController::class, 'user_destroy'])->name('user.destroy');
    Route::get('user-details/{id}', [DashboardController::class, 'user_details'])->name('user.details');
    // category route
    Route::as('category.')->prefix('category/')->group(function(){
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::get('create', [CategoryController::class, 'create'])->name('create');
        Route::post('store', [CategoryController::class, 'store'])->name('store');
        Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('edit');
        Route::put('update/{id}', [CategoryController::class, 'update'])->name('update');
        Route::delete('destroy/{id}', [CategoryController::class, 'destroy'])->name('destroy');
    });
     // brand route
     Route::as('brand.')->prefix('brand/')->group(function(){
        Route::get('/', [BrandController::class, 'index'])->name('index');
        Route::get('create', [BrandController::class, 'create'])->name('create');
        Route::post('store', [BrandController::class, 'store'])->name('store');
        Route::get('edit/{id}', [BrandController::class, 'edit'])->name('edit');
        Route::put('update/{id}', [BrandController::class, 'update'])->name('update');
        Route::delete('destroy/{id}', [BrandController::class, 'destroy'])->name('destroy');
    });
     // product route
     Route::as('product.')->prefix('product/')->group(function(){
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::get('create', [ProductController::class, 'create'])->name('create');
        Route::post('store', [ProductController::class, 'store'])->name('store');
        Route::get('edit/{id}', [ProductController::class, 'edit'])->name('edit');
        Route::put('update/{id}', [ProductController::class, 'update'])->name('update');
        Route::delete('destroy/{id}', [ProductController::class, 'destroy'])->name('destroy');
        Route::get('destroy/image/{id}', [ProductController::class, 'destroy_image'])->name('destroy.image');
    });

     // color route
     Route::as('color.')->prefix('color/')->group(function(){
        Route::get('/', [ColorController::class, 'index'])->name('index');
        Route::get('create', [ColorController::class, 'create'])->name('create');
        Route::post('store', [ColorController::class, 'store'])->name('store');
        Route::get('edit/{id}', [ColorController::class, 'edit'])->name('edit');
        Route::put('update/{id}', [ColorController::class, 'update'])->name('update');
        Route::delete('destroy/{id}', [ColorController::class, 'destroy'])->name('destroy');
        Route::get('destroy/image/{id}', [ColorController::class, 'destroy_image'])->name('destroy.image');
    });
    // edit color route
    Route::as('color.')->prefix('color/')->group(function(){
        Route::get('edit-color/{id}', [ProductController::class, 'edit_color'])->name('editcolor');
        Route::post('product-color/{id}', [ProductController::class, 'update_color']);
        Route::get('product-color-delete/{id}', [ProductController::class, 'destroy_color']);
    });
    //slider route
    Route::as('slider.')->controller(SliderController::class)->prefix('slider/')-> group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::put('/update/{id}', 'update')->name('update');
        Route::delete('/destroy/{id}', 'destroy')->name('destroy');
    });
     //order route
     Route::as('orders.')->controller(\App\Http\Controllers\Admin\OrderController::class)->prefix('orders')->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('/details/{id}', 'order_details')->name('details');
        Route::put('/update/{id}', 'order_update')->name('update');
        Route::get('/history', 'order_history')->name('history');
     });
     //invoice route
     Route::as('invoice.')->controller(\App\Http\Controllers\Admin\OrderController::class)->prefix('invoice')->group(function(){
        Route::get('/view/{id}', 'invoice_view')->name('view');
        Route::get('/generate/{id}', 'invoice_generate')->name('generate');
        Route::get('/mail/{id}', 'invoice_mail')->name('mail');
     });
      //settings route
      Route::as('setting.')->controller(\App\Http\Controllers\Admin\SettingController::class)->prefix('setting')->group(function(){
        Route::get('/view', 'index')->name('index');
        Route::post('/store', 'store')->name('store');
     });

});



