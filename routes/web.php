<?php

use App\Http\Controllers\admin\PriceTypeController;
use App\Http\Controllers\Admin\ProductStateController;
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

//Productstate routes
Route::get('admin/productstates/{productstate}/delete', [ProductStateController::class, 'delete'])
    ->name('productstates.delete');
Route::resource('/admin/productstates', ProductStateController::class);

//Pricetype routes
Route::get('admin/pricetypes/{pricetype}/delete', [PriceTypeController::class, 'delete'])
    ->name('pricetypes.delete');
Route::resource('/admin/pricetypes', PriceTypeController::Class);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
