<?php

use App\Http\Controllers\StorageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response('BASE_URL: ' . env('APP_URL'));
});

Route::prefix('v1/storage/{token}')->group(function () {
    Route::get('/', [StorageController::class, 'index']);
    Route::post('/', [StorageController::class, 'store']);
    Route::delete('/{storage:uuid}', [StorageController::class, 'delete']);
});
