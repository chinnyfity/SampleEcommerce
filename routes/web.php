<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Auth\LoginController;


Auth::routes();

Route::get('/clear', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:clear'); // refreshes env
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('route:cache');
    Artisan::call('optimize:clear'); // do this before uploading to cpanel   
    return "Cleared and optimized!";
});



Route::get('/', [HomeController::class, 'index'])->name('');
Route::get('cart', [CartController::class, 'cart']);
Route::get('checkout', [CartController::class, 'checkout']);
Route::get('view/{id}/{name}', [HomeController::class, 'view_product'])->name('view');
Route::get('signout', function(){
    Auth::guard('user')->logout();
    return Redirect::to('/');
});

Route::get('/{id}', [HomeController::class, 'index']);

Route::post('add-cart', [CartController::class, 'add_cart']);
Route::post('remove-item', [CartController::class, 'remove_item']);
Route::post('update-qty', [CartController::class, 'update_qty']);
Route::post('store-details', [CartController::class, 'store_details']);
Route::post('submit-details', [CartController::class, 'submit_details']);
Route::post('login', [LoginController::class, 'login']);



