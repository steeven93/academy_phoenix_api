<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});


Route::prefix('mails')->group(function () {
    Route::get('welcome_member', function () {
        $member = App\Models\User::find(1);
        return new App\Mail\WelcomeMember($member);
    });

    Route::get('verify_email', function () {
        $member = App\Models\User::find(1);
        $options = array(
            'verify_url' => 'http://gotohere.com',
        );
        return new App\Mail\VerifyEmail($member, $options);
    });

    Route::get('forgot_password', function () {
        $member = App\models\User::find(1);
        $options = array(
            'reset_link' => 'http://gotohere.com',
        );
        return new App\Mail\ForgotPassword($member, $options);
    });

    Route::get('thanks_payment', function () {
        $member = App\Models\User::find(1);
        $options = array(
            'invoice_id' => '10087866', 'invoice_total' => '100.07', 'download_link' => 'http://gotohere.com',
        );
        return new App\Mail\ThankYouPayment($member, $options);
    });
});
