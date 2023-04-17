<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\ApiHomeController;
use App\Http\Controllers\APIs\ApiHomeController;
use App\Http\Controllers\APIs\ApiCartController;
use App\Http\Controllers\APIs\Auth\ApiLoginController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});




Route::get('/products', [ApiHomeController::class, 'index']);
Route::get('cart', [ApiCartController::class, 'cart']);
Route::get('checkout', [ApiCartController::class, 'checkout']);
Route::get('signout', function(){
    auth()->user()->token()->revoke();
    Auth::guard('user')->logout();
});
Route::get('view/{id}/{name}', [ApiHomeController::class, 'view_product']);


Route::post('add-cart', [ApiCartController::class, 'add_cart']);
Route::post('remove-item', [ApiCartController::class, 'remove_item']);
Route::post('update-qty', [ApiCartController::class, 'update_qty']);
Route::post('store-details', [ApiCartController::class, 'store_details']);
Route::post('submit-details', [ApiCartController::class, 'submit_details']);
Route::post('login', [ApiLoginController::class, 'login']);


