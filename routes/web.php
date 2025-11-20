<?php

use Illuminate\Support\Facades\Route;
use Modules\Employees\Http\Controllers\EmployeesController;

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

Route::get('/', [EmployeesController::class, 'index']);
Route::get('/employees', [EmployeesController::class, 'index'])->name('employees.index');
Route::get('/proposal', [ProposalController::class, 'index'])->name('proposal.index');
Route::get('/serviceused', [ServiceusedController::class, 'index'])->name('serviceused.index');
Route::get('/timesheet', [TimesheetController::class, 'index'])->name('timesheet.index');
