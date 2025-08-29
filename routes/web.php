<?php

use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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
Route::get('/lang/{locale}', function ($locale) {
    if (!in_array($locale, ['en', 'ar'])) {
        abort(400);
    }

    session(['locale' => $locale]);

    return redirect()->back();
});
Route::post('/messages', [MessageController::class, 'store']);


Route::get('/', function () {
    return view('index');
});
// Show admin login form
Route::get('admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AdminController::class, 'login']);


Route::prefix('admin')->name('admin.')->group(function () {

    // Authenticated routes (only for logged-in admins)
    Route::middleware('auth:admin')->group(function () {
        // Handle logout
        Route::get('logout', [AdminController::class, 'logout'])->name('logout');

        // Admin dashboard
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        // Show admin register form
        Route::get('register', [AdminController::class, 'showRegisterForm'])->name('register');
        Route::post('register', [AdminController::class, 'register']);
    });
});
