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
Route::get('customer/hireFreelancer', [CustomerController::class, 'hireFreelancer'])->name('customer.hireFreelancer');
Route::get('customer/filter', [CustomerController::class, 'filter'])->name('customer.filter');
Route::get('freelancer/searchWithSkills', [FreelancerController::class, 'searchWithSkills'])->name('freelancer.searchWithSkills');
Route::get('freelancer/filter', [FreelancerController::class, 'filter'])->name('freelancer.filter');
Route::get('customer/hire/{freelancer_id}', [CustomerController::class, 'hire'])->name('customer.hire');

Route::post('freelancer/createSkills', [FreelancerController::class, 'createSkills'])->name('freelancer.createSkills');
Route::resource('customer', CustomerController::class);
Route::resource('freelancer', FreelancerController::class);
Route::resource('jobs', JobsController::class);
Route::get('customer/show_customer_request/{job_id}', [CustomerController::class, 'show_customer_request'])->name('customer.show_customer_request');
Route::get('jobs/approve/{job_id}/{freelancer_id}', [JobsController::class, 'approve'])->name('jobs.approve');
Route::get('jobs/rate/{job_id}/{freelancer_id}', [JobsController::class, 'rate'])->name('jobs.rate');
Route::get('jobs/releaseProject/{job_id}', [JobsController::class, 'releaseProject'])->name('jobs.releaseProject');
Route::post('jobs/newJob', [JobsController::class, 'newJob'])->name('jobs.newJob');
Route::post('jobs/rateJob', [JobsController::class, 'rateJob'])->name('jobs.rateJob');
Route::get('jobs/customer_chat/{job_id}/{freelancer_id}', [JobsController::class, 'customer_chat'])->name('jobs.customer_chat');
Route::get('jobs/freelancer_chat/{job_id}/{customer_id}', [JobsController::class, 'freelancer_chat'])->name('jobs.freelancer_chat');
Route::post('jobs/send_message', [JobsController::class, 'send_message'])->name('jobs.send_message');






