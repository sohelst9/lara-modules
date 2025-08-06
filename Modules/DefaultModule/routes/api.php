<?php

use Illuminate\Support\Facades\Route;
use Modules\DefaultModule\Http\Controllers\DefaultModuleController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('defaultmodules', DefaultModuleController::class)->names('defaultmodule');
});
