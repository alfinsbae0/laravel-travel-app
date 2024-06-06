<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\DestinationController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index']);

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    // CRUD destinations routes
    Route::get('/destination', [DestinationController::class, 'index'])->name('admin.destination.index');
    Route::post('/destination', [DestinationController::class, 'store'])->name('admin.destination.post');
    Route::put('/destination/{id}', [DestinationController::class, 'update'])->name('admin.destination.update');
    Route::delete('/destination/{id}', [DestinationController::class, 'destroy'])->name('admin.destination.destroy');


    // admin Schedule Routes
    Route::get('/schedule', [ScheduleController::class, 'index'])->name('admin.schedule.index');
    Route::post('/schedule', [ScheduleController::class, 'store'])->name('admin.schedule.post');
    Route::put('/schedule/{id}', [ScheduleController::class, 'update'])->name('admin.schedule.update');
    Route::delete('/schedule/{id}', [ScheduleController::class, 'destroy'])->name('admin.schedule.destroy');


    // admin Bookings routes
    Route::get('/booking', [BookingController::class, 'index'])->name('admin.booking.index');
});

Route::middleware(['auth', 'role:user'])->group(function () {

    // user booking routes
    Route::get('/booking', [BookingController::class, 'create'])->name('user.booking.create');
    Route::post('/booking', [BookingController::class, 'store'])->name('user.booking.post');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');



require __DIR__ . '/auth.php';
