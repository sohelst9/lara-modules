<?php

use Illuminate\Support\Facades\Route;
use Modules\DefaultModule\Http\Controllers\DefaultModuleController;

Route::get('/', [DefaultModuleController::class, 'index']);
