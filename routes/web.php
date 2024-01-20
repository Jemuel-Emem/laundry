<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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

Route::middleware([

    ])->group(function () {
         Route::get('/dashboard', function () {
           if (auth()->user()->is_admin == 1) {
            return redirect()->route('adminpage');
           }else{
            return view('user.index');
           }
         })->name('userdashboard');

    });

   //admin here
   Route::prefix('admin')->middleware('admin')->group(function(){
    Route::get('/Admin', function(){
        return view('admin.index');
        })->name('adminpage');

});
// Route::get('/', function(){
//     return view('user.index');
//     })->name('landingpage');
 Route::view('/', 'landingpage')->name('landingpage');

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
require __DIR__.'/auth.php';
