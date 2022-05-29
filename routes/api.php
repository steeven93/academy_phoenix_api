<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\V1\AddressController;
use App\Http\Controllers\Api\V1\CustomerController;
use App\Http\Controllers\Api\V1\SettingController;
use App\Http\Controllers\Api\V1\UserController;
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
Route::post('login', [AuthController::class, 'signin']);
Route::post('register', [AuthController::class, 'signup']);


Route::group(['middleware'  => ['auth:sanctum']],function () {
    Route::post('logout', [AuthController::class, 'logout']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum'])->prefix('V1')->group(function () {

    /**
     * Customers
     */
    Route::post('customer/create', [CustomerController::class, 'store']);
    Route::delete('customer/{customer}/delete', [CustomerController::class, 'destroy']);
    Route::put('customer/{customer}', [CustomerController::class, 'update']);
    Route::get('customer/', [CustomerController::class, 'get_customers']);
    Route::get('customer/{customer}', [CustomerController::class, 'get_customer']);

    Route::post('customer/create_thesis/{customer}', [CustomerController::class, 'create_thesis']);
    Route::post('customer/create_matrix/{customer}', [CustomerController::class, 'create_matrix']);
    /**
     * Plan Subscription
     */


     /**
      * Address
      */
    Route::post('address/create', [AddressController::class, 'store']);
    Route::delete('address/{address}/delete', [AddressController::class, 'destroy']);
    Route::put('address/{address}', [AddressController::class, 'update']);
    Route::get('address/', [AddressController::class, 'get_addresses']);
    Route::get('address/{address}', [AddressController::class, 'get_address']);

    /**
     * Settings
     */
    Route::get('get_settings', [SettingController::class, 'get_settings']);
});
