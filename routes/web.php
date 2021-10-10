<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index'])->name('landing');
Route::get('/home', [HomeController::class, 'index'])->name('landing');
Route::get('/events', [HomeController::class, 'showEvents'])->name('landing.events');
Route::get('/events/{slug}/show', [HomeController::class, 'showOneEvent'])->name('landing.event.show');
Route::get('/rentals', [HomeController::class, 'showRentals'])->name('landing.rentals');
Route::get('/rentals/{slug}/show', [HomeController::class, 'showOneRental'])->name('landing.rental.show');

Route::post('/events/checkout', [HomeController::class, 'checkout'])->name('ticket.checkout');

Route::group(['middleware' => 'auth:sanctum', 'verified'], function () {

    Route::get('/admin', [AdminController::class, 'index'])->name('admin');

    Route::get('/admin/events/add', [EventController::class, 'add'])->name('events.add');
    Route::resource('admin/events', EventController::class);

    Route::get('/admin/tools/add', [ToolController::class, 'add'])->name('tools.add');
    Route::resource('admin/tools', ToolController::class);

    Route::get('/admin/tickets', [AdminController::class, 'showTickets'])->name('tickets.index');
    Route::get('/admin/tickets/{id}/purchasers', [AdminController::class, 'showPurchasers'])->name('tickets.purchasers');

    Route::get('/admin/tickets/{id}/purchasers/export/{key}', [AdminController::class, 'purchasersExport'])->name('purchasers.export');

    Route::get('/admin/rentals', [AdminController::class, 'showRentals'])->name('rentals.index');
    Route::post('/admin/rentals/{id}/status', [AdminController::class, 'changeRentalStatus'])->name('rental.status');
    Route::post('/admin/rentals/export', [AdminController::class, 'rentalsExport'])->name('rentals.export');

    // Route::post('/events/checkout', [HomeController::class, 'checkout'])->name('ticket.checkout');
});
