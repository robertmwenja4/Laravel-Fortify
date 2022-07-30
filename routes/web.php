<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\BagPassController;
use App\Http\Controllers\FlightsController;
use App\Http\Controllers\LuggagesController;
use App\Http\Controllers\PassangersController;
use App\Http\Controllers\BagStatusController;
use App\Http\Controllers\ExpectedBagsController;
use App\Http\Controllers\Profile;
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
Route::get('/home', function () {
    return view('index');
});
Route::prefix('user')->middleware(['auth'])->name('user.')->group(function () {
    Route::get('profile', Profile::class)->name('profile');
});
Route::resource('/luggages', LuggagesController::class);
Route::get('/product/search/', [LuggagesController::class, 'search'])->name('luggage.search');

Route::get('/searchUser', [UserController::class, 'search']);
Route::get('/searchPassanger', [PassangersController::class, 'search']);
Route::get('/searchf', [PassangersController::class, 'look']);
Route::get('/searchflight', [FlightsController::class, 'search']);
Route::get('/searchBag', [LuggagesController::class, 'lookfor']);
Route::post('fetch', [PassangersController::class, 'fetch'])->name('passanger.fetch');

Route::prefix('admin')->middleware('auth')->name('admin.')->group(function () {
    Route::resource('/passanger', PassangersController::class);
    Route::put('/passanger/{id}', [PassangersController::class, 'update1'])->name('passanger.update1');
    Route::resource('/flights', FlightsController::class);
    Route::resource('/users', UserController::class);
    Route::resource('status', BagStatusController::class);
    Route::resource('/dashboard', DashboardController::class);
    Route::resource('/expected', ExpectedBagsController::class);
    Route::resource('/passbagstatus', BagPassController::class);
});

//Github
Route::get('/auth/redirect/github', [LoginController::class, 'redirectToGithub'])->name('login.github');
Route::get('/auth/github/callback', [LoginController::class, 'redirectToGithubCallback']);

//Facebook
Route::get('/auth/redirect/facebook', [LoginController::class, 'redirectToFacebook'])->name('login.facebook');
Route::get('/auth/facebook/callback', [LoginController::class, 'redirectToFacebookCallback']);
//Google
Route::get('/auth/redirect', [LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('/auth/google/callback', [LoginController::class, 'redirectToGoogleCallback']);
