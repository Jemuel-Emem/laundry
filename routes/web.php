<?php

use App\Http\Controllers\AuthController;
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

// Route::view('/', 'welcome');

Route::get('/dashboard', function () {
    if (auth()->check()) {
        if (auth()->user()->is_admin == 1) {
            return redirect()->route('adminpage');
        } elseif (auth()->user()->is_admin == 0) {
            return redirect()->route('user.dashboard');
        } else {
            return view('user.index');
        }
    } else {
        return redirect()->route('login');
    }

})->name('userdashboard');

//admin here
Route::prefix('admin')->middleware('admin')->group(function () {
    Route::get('/Admin', function () {
        return view('admin.index');
    })->name('adminpage');
});

Route::prefix('user')->middleware('user')->group(function () {
    Route::get('/dashboard', function () {
        return view('user.index');
    })->name('user.dashboard');
    Route::get('/laundry-now', function () {
        return view('user.transaction');
    })->name('user.transaction');
});

Route::view('/', 'landingpage')->name('landingpage');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
require __DIR__ . '/auth.php';
