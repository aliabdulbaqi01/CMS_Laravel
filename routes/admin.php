<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

Route::get('logout', [AdminController::class, 'destroy'])
    ->name('logout');

/*
 * slider  route
 */
Route::resource('slides', SliderController::class)->only(['index']);