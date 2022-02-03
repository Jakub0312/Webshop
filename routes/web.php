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
    Route::resource('/admin/users', UserController::Class);

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

    //Reviews routes
    Route::get('admin/reviews/{review}/delete', [Admin\ReviewController::class, 'delete'])
        ->name('reviews.delete');
    Route::resource('/admin/reviews', Admin\ReviewController::Class);

});

//PUBLIC PAGE


//products
Route::get('/products', [
    Open\ProductController::class, 'index'])
    ->name('publicproduct.index');


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


//Profile page
Route::get('/profile', [
    Open\UserController::class, 'getIndex'])
    ->name('profile');
//edit user information
Route::get('/profile/edit-profile', [
    Open\UserController::class, 'editProfile'])
    ->name('profile.editprofile');
//add address
Route::get('/profile/add-address', [
    Open\UserController::class, 'addAddress'])
    ->name('profile.addaddress');
Route::post('/profile/store-address', [
    Open\UserController::class, 'storeAddress'])
    ->name('profile.storeaddress');
//edit address
Route::get('/profile/edit-address', [
    Open\UserController::class, 'editAddress'])
    ->name('profile.editaddress');
Route::put('/profile/{address}/update-address', [
    Open\UserController::class, 'updateAddress'])
    ->name('profile.updateaddress');
//edit profile
Route::get('/profile/edit-profile', [
    Open\UserController::class, 'editProfile'])
    ->name('profile.editprofile');
Route::put('/profile/{user}/update-profile', [
    Open\UserController::class, 'updateProfile'])
    ->name('profile.updateprofile');
//Delete profile
Route::get('/profile/delete-profile', [
    Open\UserController::class, 'deleteProfile'])
    ->name('profile.deleteprofile');
Route::delete('/profile/{user}/destroy-profile', [
    Open\UserController::class, 'destroyProfile'])
    ->name('profile.destroyProfile');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
