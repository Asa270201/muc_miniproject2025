<?php

use Illuminate\Support\Facades\Route;
use Modules\Serviceused\Http\Controllers\ServiceusedController;

Route::prefix('serviceused')->group(function() {
    Route::get('/', [ServiceusedController::class, 'index'])->name('serviceused.index');
    Route::get('/create', [ServiceusedController::class, 'create'])->name('serviceused.create');
    Route::post('/store', [ServiceusedController::class, 'store'])->name('serviceused.store');
    Route::get('/edit/{id}', [ServiceusedController::class, 'edit'])->name('serviceused.edit');
    Route::put('/update/{id}', [ServiceusedController::class, 'update'])->name('serviceused.update');
    Route::delete('/delete/{id}', [ServiceusedController::class, 'destroy'])->name('serviceused.destroy');
});

 