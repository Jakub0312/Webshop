<?php

use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\OrderrowController;
use App\Http\Controllers\admin\PricetypeController;
use App\Http\Controllers\Admin\ProductstateController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\public\CartController;
use App\Http\Controllers\public\ProductController;
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
Route::get('admin/productstates/{productstate}/delete', [ProductstateController::class, 'delete'])
    ->name('productstates.delete');
Route::resource('/admin/productstates', ProductstateController::class);

//Pricetype routes
Route::get('admin/pricetypes/{pricetype}/delete', [PricetypeController::class, 'delete'])
    ->name('pricetypes.delete');
Route::resource('/admin/pricetypes', PricetypeController::Class);

//User routes
Route::get('admin/users/{user}/delete', [UserController::class, 'delete'])
    ->name('users.delete');
Route::resource('/admin/users', UserController::Class);

//Orders routes
Route::get('admin/orders/{order}/delete', [OrderController::class, 'delete'])
    ->name('orders.delete');
Route::resource('/admin/orders', OrderController::Class);

//Orderrows routes
Route::get('admin/orderrows/{orderrow}/delete', [OrderrowController::class, 'delete'])
    ->name('orderrows.delete');
Route::resource('/admin/orderrows', OrderrowController::Class);

});

//PUBLIC PAGE


//products
Route::get('/products', [
    ProductController::class, 'index'])
    ->name('product.index');;


//Routes for shopping cart
//adding product to shopping cart
Route::get('/add-to-cart/{id}', [
    ProductController::class, 'getAddToCart'])
    ->name('product.addToCart');

//going to shopping cart
Route::get('/shopping-cart', [
    ProductController::class, 'getCart'])
    ->name('product.shoppingCart');

//Going to checkout
Route::get('/checkout', [
    ProductController::class, 'getCheckout'])
    ->name('carts.checkout');

//place order
Route::post('/save-order', [
    ProductController::class, 'saveOrder'])
   ->name('carts.saveorder');
//Route::post('/saveorder', 'ProductController@saveOrder');
//Route::get('/save-order')


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
