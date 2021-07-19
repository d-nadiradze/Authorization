<?php

use App\Http\Controllers\Auth\ConfirmPasswordController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SetPasswordController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});
Route::get('/home', [HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('email/verify', [VerificationController::class, 'show'])->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/home');
})->middleware('auth')->name('verification.verify');

Route::post('/email/resend', function (Request $request) {
    Auth::user()->sendEmailVerificationNotification();

    return redirect()->back()->with(['success' => 'a']);
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/register/password', [SetPasswordController::class, 'show'])->middleware('auth')->name('confirm');
Route::post('/register/password', [SetPasswordController::class, 'update'])->middleware('auth')->name('set_password');

Route::get('/applicants',[HomeController::class , 'showApplicants'])->middleware('auth');
Route::post('/applicants/set',[HomeController::class , 'store'])->middleware('auth');

Route::get('/my-applicants',[HomeController::class, 'myApplicants'])->middleware('auth');

