<?php

use App\Http\Controllers\BagStatusController;
use App\Http\Controllers\LuggagesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/product/search/{cardID}', [LuggagesController::class, 'search']);
Route::post('/status', [BagStatusController::class, 'store']);