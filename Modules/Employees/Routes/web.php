<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;
use Modules\Employees\Http\Controllers\EmployeesController;

Route::prefix('employees')->group(function() {
    Route::get('/index', [EmployeesController::class, 'index'])->name('employees.index');
    Route::get('/create', [EmployeesController::class, 'create'])->name('employees.create');
    Route::post('/', [EmployeesController::class, 'store'])->name('employees.store');
    Route::get('/{id}', [EmployeesController::class, 'show'])->name('employees.show');
    Route::get('/{id}/edit', [EmployeesController::class, 'edit'])->name('employees.edit');
    Route::put('/{id}', [EmployeesController::class, 'update'])->name('employees.update');
    Route::delete('/{id}', [EmployeesController::class, 'destroy'])->name('employees.destroy');
});

