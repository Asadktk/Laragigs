<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

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
//All Listings
Route::get('/', [ListingController::class, 'index']);

//Create Listing
Route::get('listing/create', [ListingController::class, 'create'])->middleware('auth');

//Store Listing
Route::post('listing', [ListingController::class, 'store'])->middleware('auth');

//Show edit listing Form
Route::get('listing/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

//Update Listing
Route::put('listing/{listing}', [ListingController::class, 'update'])->middleware('auth');

//Delete Listing
Route::delete('listing/{listing}', [ListingController::class, 'destroy'])->middleware('auth');

//Manage listings
Route::get('/listing/manage', [ListingController::class, 'manage'])->middleware('auth');

//Single Listing
Route::get('/listing/{listing}', [ListingController::class, 'show']);

//Show Register/create Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

//Create New User
Route::post('/users', [UserController::class, 'store']);

//User Logout
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

//Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

//Login User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);


    


