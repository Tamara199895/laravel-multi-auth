<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FreelancerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

Route::middleware(['auth'])->group(function(){
    Route::get('/home',[HomeController::class, 'index'])->name('home'); 
    Route::get('/works', [WorksController::class, 'index']);
});

Route::middleware(['auth', 'user-access:customer'])->group(function(){
    Route::get('customer/home',[HomeController::class, 'customerHome'])->name('customer.home'); 
});

Route::middleware(['auth', 'user-access:freelancer'])->group(function(){
    Route::get('freelancer/home',[HomeController::class, 'freelancerHome'])->name('freelancer.home'); 
});
// Route::get('jobs/apply', 'JobsController@apply')->name('jobs.apply');
Route::resource('customer', CustomerController::class);
Route::resource('freelancer', FreelancerController::class);
Route::resource('jobs', JobsController::class);
Route::get('customer/show_customer_request/{id}', [CustomerController::class, 'show_customer_request'])->name('customer.show_customer_request');

