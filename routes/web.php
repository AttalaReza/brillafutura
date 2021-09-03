<?php

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



// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');


Route::group(['middleware' => 'auth:sanctum', 'verified'], function () {
    Route::get('/', function () {
        return view('admin.index');
    });
    Route::get('/events', function () {
        return view('admin.events.index');
    });
    Route::get('/events/add', function () {
        return view('admin.events.add');
    });
    Route::get('/tools', function () {
        return view('admin.tools.index');
    });
    Route::get('/tickets', function () {
        return view('admin.tickets.index');
    });
    Route::get('/tickets/purchasers', function () {
        return view('admin.tickets.purchasers');
    });
    Route::get('/rentals', function () {
        return view('admin.rentals.index');
    });
});
