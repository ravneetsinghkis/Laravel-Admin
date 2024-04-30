<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InviteController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('admin-home', [HomeController::class, 'adminHome'])->name('admin.home');
    Route::get('profile',[ProfileController::class,'index'])->name('profile');
    Route::post('profile/{id}',[ProfileController::class,'update'])->name('profile.update');
    Route::get('inviteuser/',[InviteController::class,'inviteindex'])->name('invite.inviteindex');
    Route::post('inviteuser',[InviteController::class,'send_invite'])->name('invite.send_invite');
    Route::get('/users', [ProfileController::class, 'index'])->name('profile.index');
    //Route::post('/user/create', [ProfileController::class, 'store'])->name('drivers.store');
    Route::get('users/edit/{id}', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('users/view/{id}', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('users/update/{update}', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('users/delete/{id}', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::put('users/approved/{user_id}', [ProfileController::class, 'isapproved'])->name('profile.isapproved');
    //Route::put('/products/{products}', 'ProfileController@update')->name('products.update');




});