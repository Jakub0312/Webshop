<?php

use App\Http\Controllers\admin\PricetypeController;
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

Route::get('/', function () {
    return view('layouts.layout');
});

Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/admin', function () {
        return view('admin.index');
    });
});

//Productstate routes
Route::get('admin/productstates/{productstate}/delete', [ProductstateController::class, 'delete'])
    ->name('productstates.delete');
Route::resource('/admin/productstates', ProductstateController::class);

//Pricetype routes
Route::get('admin/pricetypes/{pricetype}/delete', [PricetypeController::class, 'delete'])
    ->name('pricetypes.delete');
Route::resource('/admin/pricetypes', PricetypeController::Class);

//User routes

Route::group(['middleware' => ['role:admin']], function () {
    Route::get('admin/users/{user}/delete', [UserController::class, 'delete'])
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
