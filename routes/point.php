<?php


use App\Http\Controllers\PointOfSale\EmployeeController;
use App\Http\Controllers\PointOFSale\PointController;
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


// dashboard
Route::get('/', [PointController::class, 'index'])->name('index');

// employee
Route::resource('/employees', EmployeeController::class);




