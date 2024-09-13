<?php

use App\Http\Controllers\backend\AboutController;
use App\Http\Controllers\Backend\AboutImageController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\BlogCategoryController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\PasswordController;
use App\Http\Controllers\backend\PortfolioController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\SliderController;
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

// dashboard
Route::get('/dashboard', function () {return view('admin.index'); })->name('dashboard');
// logout
Route::get('logout', [AdminController::class, 'destroy'])->name('logout');

// Profile
Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

// change password
Route::get('/password/edit', [PasswordController::class, 'edit'])->name('password.edit');
Route::put('/password', [PasswordController::class, 'update'])->name('password.update');

// Slider
Route::get('/slides/edit', [SliderController::class, 'edit'])->name('slides.edit');
Route::put('/slides/{slide}', [SliderController::class, 'update'])->name('slides.update');

// about
Route::get('/abouts/edit',[AboutController::class, 'edit'])->name('abouts.edit');
Route::put('/abouts/{about}', [AboutController::class, 'update'])->name('abouts.upda te');

// about image
Route::resource('about/images', AboutImageController::class)->only(['store', 'create',]);

// portfolio
Route::resource('/portfolios', PortfolioController::class)->except('show');

// portfolio
Route::as('.blog')->prefix('blog')->resource('categories', BlogCategoryController::class)->except('show');

// admin
Route::resource('blogs', BlogController::class)->except('show');
