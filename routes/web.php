<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoxController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\BoxController as AdminBoxController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Auth\GoogleController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [BoxController::class, 'index'])->name('index');
Route::get('/about', [BoxController::class, 'about'])->name('about');
Route::get('/how-it-works', [BoxController::class, 'howItWorks'])->name('how-it-works');
Route::get('/contact', [BoxController::class, 'contact'])->name('contact');

Route::get('/terms-conditions', [BoxController::class, 'termsConditions'])->name('terms-conditions');
Route::get('/privacy-policy', [BoxController::class, 'privacyPolicy'])->name('privacy-policy');

Route::get('/totalordercount', [BoxController::class, 'getTotalOrderCount'])->name('boxes.totalordercount');
Route::get('/getnfttype', [BoxController::class, 'getNftType'])->name('boxes.getnfttype');
Route::get('/getorderdetail/{id}', [BoxController::class, 'getOrderDetail'])->name('boxes.getorderdetail');
Route::post('/getboxdetail', [BoxController::class, 'getBoxDetail'])->name('boxes.getboxdetail');
Route::post('/createorder', [BoxController::class, 'createOrder'])->name('boxes.createorder');

Route::middleware('auth')->group(function () {
    Route::get('/brickslist', [BoxController::class, 'bricksList'])->name('boxes.brickslist');
    Route::post('/save/user/detail', [UserController::class, 'saveUserDetail'])->name('boxes.saveuser');
    Route::get('/changepassword', [UserController::class, 'changePassword'])->name('changepassword');
    Route::post('/updatepassword', [UserController::class, 'updatePassword'])->name('updatepassword');
    Route::get('/brickdetail/{id}', [BoxController::class, 'brickdetail'])->name('brickdetail');
    Route::post('/userquestionsupdate', [UserController::class, 'userQuestionsUpdate'])->name('boxes.userquestionsupdate');
    Route::post('/uploadnft', [BoxController::class, 'uploadNFT'])->name('boxes.uploadnft');
});

Route::middleware('auth:admin')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::get('/brickslist', [AdminBoxController::class, 'bricksList'])->name('admin.brickslist');
        Route::get('/userslist', [AdminUserController::class, 'index'])->name('admin.userslist');
        Route::get('/getusers', [AdminUserController::class, 'getUsers'])->name('admin.getusers');
        Route::get('/orderslist', [AdminOrderController::class, 'index'])->name('admin.orderslist');
        Route::get('/getorders', [AdminOrderController::class, 'getOrders'])->name('admin.getorders');
        Route::get('/changepassword', [AdminController::class, 'changePassword'])->name('admin.changepassword');
        Route::post('/updatepassword', [AdminController::class, 'updatePassword'])->name('admin.updatepassword');
        Route::post('/uploadpricesheet', [AdminBoxController::class, 'uploadPriceSheet'])->name('admin.uploadpricesheet');
        Route::get('/exportpricesheet', [AdminBoxController::class, 'exportPriceSheet'])->name('admin.exportpricesheet');
    });
});
Route::get('/qstart', function () {
    \Artisan::call('queue:work --once');
    return 1;
})->name('qstart');

Route::get('/mailsend', function () {
    \Mail::to(Auth::user()->email)->send(new \App\Mail\PlaceOrderMail([1],1,1));
     echo "Email Sent.";
})->name('mailsend');

Route::get('/dashboard', function () {
    return view('front/dashboard');
})->middleware(['auth'])->name('dashboard');;

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class,'handleGoogleCallback']);

require __DIR__.'/auth.php';

