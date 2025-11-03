<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SnackController;

Route::get('/snacks', [SnackController::class, 'index']);