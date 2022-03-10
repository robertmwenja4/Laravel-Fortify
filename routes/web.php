<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\FlightsController;
use App\Http\Controllers\LuggagesController;
use App\Http\Controllers\PassangersController;
use App\Http\Controllers\BagStatusController;
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
    return view('auth.login');
});
Route::get('/home', function(){
    return view('index');
});
Route::resource('/luggages', LuggagesController::class);
Route::get('/product/search/', [LuggagesController::class, 'search'])->name('luggage.search');
Route::prefix('admin')->middleware('auth')->name('admin.')->group(function () {
    Route::resource('/passanger', PassangersController::class);
    Route::put('/passanger/{id}', [PassangersController::class, 'update1'])->name('passanger.update1');
    Route::resource('/flights', FlightsController::class);
   Route::resource('/users', UserController::class);
   Route::resource('status', BagStatusController::class);
   Route::resource('/dashboard', DashboardController::class);
   
});
