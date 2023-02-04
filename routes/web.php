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
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// All Listings
Route::get('/', [ListingController::class, 'index']);
// function () {
    // return view('listings', [
    //     // 'heading'=> 'Latest Listings', 
    //     'listings'=> Listing::all()
    // ]);

    // Replace above functions with controller

// }
// );

// Show Create Form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

// Store Listing Data
Route::post('/listings', [ListingController::class,'store'])->middleware('auth');

// Show Edit Form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

// Update Listing
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

// Delete Listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');

// Manage Listings
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');

// Single Listing
// Route::get('/listings/{id}', function ($id) {
//     $listing = Listing::find($id);

//     if($listing) {
//        return view( 'listing', [
//         'heading' => "Listing $id",
//         'listing' => $listing
//     ]); 
//     } else {
//         abort('404');
//     }
// });

//Route model binding method for Single Listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);
// function (Listing $listing) {
    //    return view( 'listing', [
    //     'listing' => $listing
    // ]); 
// }
// );


// Show Register/Create Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Create New User
Route::post('/users', [UserController::class, 'store']);

// Log User Out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');


// Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Log User In
Route::post('/users/authenticate', [UserController::class, 'authenticate']);







// Route::get('/hello', function() {
//     return response('<h1>Hello World</h1>', 200)
//     ->header('Content-Type', 'text/plain')
//     ->header('foo', 'bar');
// });

// Route::get('/posts/{id}', function($id){
//     // DEBUGGING. Normally use dd
//     // dd($id); #die and dump
//     // ddd($id); #die dump and debug
//     return response("Post $id");
// })->where('id', '[0-9]+');

// Route::get("/search", function (Request $request) {
//     // dd($request->name. ' ' . $request->city);
//     return $request->name. ' ' . $request->city;
// });