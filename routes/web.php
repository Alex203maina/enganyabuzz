<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookingsController;
use App\Http\Controllers\EarningController;
use App\Http\Controllers\VehiclesController;
use App\Http\Controllers\HomeController;


Route::get('/login', function () {
    return redirect()->route('admin.login.form');
})->name('login');

Route::get('/enganya-buzz', [HomeController::class, 'index'])->name('home');
Route::get('/about-us', [HomeController::class, 'about'])->name('about');
Route::get('/destination', [HomeController::class, 'destination'])->name('destination');
Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

// Authentication Routes for Admin
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('admin.login.form');
Route::post('/login', [AuthController::class, 'login'])->name('admin.login');
Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');

// Protected Admin Routes
Route::middleware('auth:admin')->group(function () {
    Route::get('/admin', [DashboardController::class, 'index'])->name('admin.dashboard-1'); 

    // Admin pages
    Route::get('/admin/bookings', [BookingsController::class, 'index'])->name('admin.bookings');
    Route::get('/admin/earnings', [EarningController::class, 'index'])->name('admin.earnings');
    Route::get('/admin/trips', [TripController::class, 'showAll'])->name('admin.trip.index');
    Route::get('/admin/vehicles', [VehiclesController::class, 'index'])->name('admin.vehicles.index');
    Route::get('/admin/vehicles/{vehicle}/edit', [VehiclesController::class, 'edit'])->name('admin.vehicles.edit');
    Route::put('/admin/vehicles/{vehicle}', [VehiclesController::class, 'update'])->name('admin.vehicles.update');
    Route::get('/admin/dashboard-1', [DashboardController::class, 'index'])->name('admin.dashboard-1');
    Route::get('/admin/profile', [ProfileController::class, 'index'])->name('admin.profile');
    Route::put('/admin/trips/{trip}', [TripController::class, 'update'])->name('admin.trips.update');
    Route::get('/admin/vehicles/create', [VehiclesController::class, 'create'])->name('admin.vehicles.create');
    Route::post('/send-sms-bulk', [BookingsController::class, 'sendBulkSms'])->name('send.sms.bulk');
    Route::post('/send-sms', [BookingsController::class, 'sendSms'])->name('admin.send.sms');
    Route::get('/sms-form/{id}', [SmsController::class, 'showSmsForm'])->name('admin.sms.form');
    Route::post('/admin/bookings/confirm', [BookingsController::class, 'confirmBooking'])->name('bookings.confirm');
    Route::post('/admin/confirm-booking', [BookingsController::class, 'confirmBooking'])->name('admin.confirm.booking');
    Route::post('/admin/bookings/confirm', [BookingsController::class, 'confirmBooking'])->name('bookings.confirm');
Route::post('/filter-bookings', [BookingsController::class, 'filterBookings'])->name('booking.filter');
Route::match(['get', 'post'], '/filter-bookings', [BookingsController::class, 'filterBookings'])->name('filter-bookings');

});

// Trip Routes
Route::resource('trips', TripController::class);

// Booking Routes
Route::get('/bookings', [BookingsController::class, 'index'])->name('main.bookings.index');
Route::post('/bookings/download', [BookingsController::class, 'download'])->name('bookings.download');
Route::get('/booking-form/{id}', [BookingsController::class, 'showBookingForm'])->name('booking-form');
Route::resource('bookings', BookingsController::class);

// Vehicle Routes
Route::resource('vehicles', VehiclesController::class);
