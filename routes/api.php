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

Route::prefix('v1')->group(function () {
    Route::get('plan_subscription', [UserController::class, 'getPlanSubScription']);

    //to remove only test purpose
    Route::post('payment_method/set',  [UserController::class, 'setPaymentMethod']);
});

Route::group(['middleware'  => ['auth:sanctum']],function () {
    Route::post('logout', [AuthController::class, 'logout']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {

    Route::get('logged_user', [UserController::class, 'getLoggedUser']);

    /**
     * Customers
     */
    Route::post('customer/create', [CustomerController::class, 'store']);
    Route::delete('customer/{customer}', [CustomerController::class, 'destroy']);
    Route::put('customer/{customer}', [CustomerController::class, 'update']);
    Route::get('customer/', [CustomerController::class, 'get_customers']);
    Route::get('customer/{customer}', [CustomerController::class, 'get_customer']);

    //notes
    Route::post('note',[CustomerController::class, 'create_note']);
    Route::delete('note/{note}',[CustomerController::class, 'delete_note']);
    Route::put('note/{note}',[CustomerController::class, 'edit_note']);

    //thesis
    Route::get('customer/create_thesis/{customer}', [CustomerController::class, 'create_thesis']);
    Route::get('customer/create_matrix/{customer}', [CustomerController::class, 'create_matrix']);

    /**
     * Plan Subscription
     */
    Route::post('user/signup/plan_subscription', [UserController::class, 'signUpPlanSubscription']);


    /**
     * User Profile
     */
    Route::get('my_profile', [UserController::class, 'getInfoProfile']);
    Route::post('create_invoice', [UserController::class, 'create_invoice']);

    //signup
    Route::post('users/{user}/create_address', [UserController::class, 'create_address']);
    Route::post('users/{user}/create_invoice', [UserController::class, 'create_invoice']);

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


    /**
     * Stripe
     */
    Route::get('payment_method/', [UserController::class, 'getPaymentMethods'] );
    Route::get('payment_method/intent', [UserController::class, 'getIntentPaymentMethod'] );
    Route::post('payment_method/set',  [UserController::class, 'setPaymentMethod']);
    Route::delete('payment_method/delete',  [UserController::class, 'deletePaymentMethod']);

});

Route::middleware(['auth:sanctum'])->prefix('v2')->group(function () {

});
