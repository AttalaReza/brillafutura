<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ToolController;


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

    Route::get('/admin', [AdminController::class, 'index'])->name('admin');

    Route::get('/events/add', [EventController::class, 'add'])->name('events.add');
    Route::resource('events', EventController::class);

    Route::get('/tools/add', [ToolController::class, 'add'])->name('tools.add');
    Route::resource('tools', ToolController::class);

    Route::get('/tickets', [AdminController::class, 'showTickets'])->name('tickets.index');
    Route::get('/tickets/{id}/purchasers', [AdminController::class, 'showPurchasers'])->name('tickets.purchasers');

    Route::get('/rentals', [AdminController::class, 'showRentals'])->name('rentals.index');
    Route::post('/rentals/{id}/status', [AdminController::class, 'changeRentalStatus'])->name('rental.status');
});
