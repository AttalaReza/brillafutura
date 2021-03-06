<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ToolController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;

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

Route::get('/', [HomeController::class, 'index'])->name('landing');
Route::get('/home', [HomeController::class, 'index'])->name('landing');
Route::get('/events', [HomeController::class, 'showEvents'])->name('landing.events');
Route::get('/events/{slug}/show', [HomeController::class, 'showOneEvent'])->name('landing.event.show');
Route::get('/rentals', [HomeController::class, 'showRentals'])->name('landing.rentals');
Route::get('/rentals/{slug}/show', [HomeController::class, 'showOneRental'])->name('landing.rental.show');

// midtrans response
Route::post('/payments/notification', [PaymentController::class, 'notification']);
Route::get('/payments/completed', [PaymentController::class, 'completed']);
Route::get('/payments/failed', [PaymentController::class, 'failed']);
Route::get('/payments/unfinish', [PaymentController::class, 'unfinish']);

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

    Route::post('/events/{slug}/checkout', [HomeController::class, 'ticketCheckout'])->name('ticket.checkout');
    Route::post('/rentals/{slug}/checkout', [HomeController::class, 'rentalCheckout'])->name('rental.checkout');

    Route::get('profile', [UserController::class, 'index'])->name('profile.index');
    Route::post('profile/{id}', [UserController::class, 'update'])->name('profile.update');
    Route::get('profile/history', [UserController::class, 'showHistory'])->name('profile.history');
    Route::delete('profile/history/{id}/delete', [UserController::class, 'deleteHistory'])->name('profile.history.delete');
    Route::get('/invoice/{id}/exports/{key}', [UserController::class, 'invoicesExport'])->name('invoice.export');
    Route::get('/invoice/{id}/download/{key}', [UserController::class, 'invoicesDownload'])->name('invoice.download');
});
