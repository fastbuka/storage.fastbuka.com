<?php

use App\Http\Controllers\StorageController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1/storage')->group(function () {
    Route::get('/{user:uuid}', [StorageController::class, 'index']);
    Route::post('/{user:uuid}', [StorageController::class, 'store']);
    Route::delete('/{storage:uuid}/{user:uuid}', [StorageController::class, 'delete']);
});
