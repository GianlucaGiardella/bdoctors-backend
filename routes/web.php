<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\ProfileController as ControllersProfileController;
use App\Providers\RouteServiceProvider;
// il profile registrato su laravel viene rinominato controllerprofilecontroller
// il profilo creato dal dottore invece profilecontroller
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
Route::get('/', function () {
    return redirect(RouteServiceProvider::HOME);
});
Route::get('/dashboard', [ProfileController::class, 'show'])->middleware('auth')->name('profiles.show');

// middleware per autenticati profilo DOTTORE
Route::middleware('auth')
    ->prefix('/admin')->name('admin.')
    ->group(function() {
        Route::resource('profile', ProfileController::class);


    });
// middleware per autenticati profilo user registrato
Route::middleware(['auth'])->prefix('/profile')->name('profile.')->group(function () {
        
        Route::get('/', [ControllersProfileController::class, 'edit'])->name('edit');
        Route::patch('/', [ControllersProfileController::class, 'update'])->name('update');
        Route::delete('/', [ControllersProfileController::class, 'destroy'])->name('destroy');
});

require __DIR__.'/auth.php';

