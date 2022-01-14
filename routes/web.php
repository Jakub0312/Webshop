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
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
