<?php

use App\Http\Controllers\Content\AboutController;
use App\Http\Controllers\Content\AboutImageController;
use App\Http\Controllers\Content\AdminController;
use App\Http\Controllers\Content\BlogCategoryController;
use App\Http\Controllers\Content\BlogController;
use App\Http\Controllers\Content\ContactController;
use App\Http\Controllers\Content\FooterController;
use App\Http\Controllers\Content\PasswordController;
use App\Http\Controllers\Content\PortfolioController;
use App\Http\Controllers\Content\ProfileController;
use App\Http\Controllers\Content\SliderController;
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
Route::put('/abouts/{about}', [AboutController::class, 'update'])->name('abouts.update');

// about image
Route::resource('about/images', AboutImageController::class)->only(['store', 'create',]);

// portfolio
Route::resource('/portfolios', PortfolioController::class)->except('show');

// portfolio
Route::as('.blog')->prefix('blog')->resource('categories', BlogCategoryController::class)->except('show');

// Blog
Route::resource('blogs', BlogController::class)->except('show');

// Footer
Route::get('/footer', [FooterController::class, 'edit'])->name('footer.edit');
Route::put('/footer/{footer}/update', [FooterController::class, 'update'])->name('footer.update');

// Contact
Route::resource('contact', ContactController::class)->only('index','show');
