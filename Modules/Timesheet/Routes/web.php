<?php

use Modules\Timesheet\Http\Controllers\TimesheetController;
use Illuminate\Support\Facades\Route;

Route::prefix('timesheet')->group(function () {
    Route::get('/', [TimesheetController::class, 'index'])->name('timesheet.index');
});

