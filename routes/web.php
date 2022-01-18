<?php

use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\PricetypeController;
use App\Http\Controllers\Admin\ProductstateController;
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

Route::get('/admin', function (){
    return view('admin.index');
});

//Productstate routes
Route::get('admin/productstates/{productstate}/delete', [ProductstateController::class, 'delete'])
    ->name('productstates.delete');
Route::resource('/admin/productstates', ProductstateController::class);

//Pricetype routes
Route::get('admin/pricetypes/{pricetype}/delete', [PricetypeController::class, 'delete'])
    ->name('pricetypes.delete');
Route::resource('/admin/pricetypes', PricetypeController::Class);

//Orders routes
Route::get('admin/orders/{order}/delete', [OrderController::class, 'delete'])
    ->name('orders.delete');
Route::resource('/admin/orders', OrderController::Class);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
