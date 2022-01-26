<?php

use App\Http\Controllers\admin as Admin;
use App\Http\Controllers\open as Open;
use App\Http\Controllers\admin\PricetypeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductstateController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

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

//HOME
Route::get('/', function () {
    return view('layouts.layout');
});




Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/admin', function () {
        return view('admin.index');
    });
});

Route::group(['middleware' => ['role:admin']], function () {
//Productstate routes
Route::get('admin/productstates/{productstate}/delete', [Admin\ProductstateController::class, 'delete'])
    ->name('productstates.delete');
Route::resource('/admin/productstates', Admin\ProductstateController::class);

//Pricetype routes
Route::get('admin/pricetypes/{pricetype}/delete', [Admin\PricetypeController::class, 'delete'])
    ->name('pricetypes.delete');
Route::resource('/admin/pricetypes', Admin\PricetypeController::Class);

// Product routes
Route::get('admin/products/{product}/delete', [Admin\ProductController::class, 'delete'])
    ->name('products.delete');
Route::resource('/admin/products', Admin\ProductController::Class);

//User routes
Route::get('admin/users/{user}/delete', [Admin\UserController::class, 'delete'])
    ->name('users.delete');
Route::resource('/admin/users', Admin\UserController::Class);

//Orders routes
Route::get('admin/orders/{order}/delete', [Admin\OrderController::class, 'delete'])
    ->name('orders.delete');
Route::resource('/admin/orders', Admin\OrderController::Class);

//Orderrows routes
Route::get('admin/orderrows/{orderrow}/delete', [Admin\OrderrowController::class, 'delete'])
    ->name('orderrows.delete');
Route::resource('/admin/orderrows', Admin\OrderrowController::Class);

});

//PUBLIC PAGE


//products
Route::get('/products', [
    Open\ProductController::class, 'index'])
    ->name('product.index');;


//Routes for shopping cart
//adding product to shopping cart
Route::get('/add-to-cart/{id}', [
    Open\ProductController::class, 'getAddToCart'])
    ->name('product.addToCart');

//going to shopping cart
Route::get('/shopping-cart', [
    Open\ProductController::class, 'getCart'])
    ->name('product.shoppingCart');

//Going to checkout
Route::get('/checkout', [
    Open\ProductController::class, 'getCheckout'])
    ->name('carts.checkout');

//place order
Route::post('/save-order', [
    Open\ProductController::class, 'saveOrder'])
   ->name('carts.saveorder');
//Route::post('/saveorder', 'ProductController@saveOrder');
//Route::get('/save-order')


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
