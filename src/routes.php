<?php

use Devfaysal\SelectOption\Http\Controllers\OptionController;

Route::middleware(['web'])->prefix('/admin')->group(function () {
    Route::group(['middleware' => ['admin.auth:admin','permission:access_admin_dashboard']], function () {
        Route::get('/options', [OptionController::class, 'index'])->name('laravelSelectOption.index');
        Route::get('/options/datatable', [OptionController::class, 'datatable'])->name('laravelSelectOption.datatable');
        Route::get('/options/create', [OptionController::class, 'create'])->name('laravelSelectOption.create');
        Route::post('/options/store', [OptionController::class, 'store'])->name('laravelSelectOption.store');
        Route::get('/options/{option}', [OptionController::class, 'show'])->name('laravelSelectOption.show');
        Route::get('/options/{option}/edit', [OptionController::class, 'edit'])->name('laravelSelectOption.edit');
        Route::patch('/options/{option}', [OptionController::class, 'update'])->name('laravelSelectOption.update');
        Route::delete('/options/{option}/delete', [OptionController::class, 'delete'])->name('laravelSelectOption.delete');
    });
});