<?php

use App\Http\Controllers\StarshipController;
use Illuminate\Support\Facades\Route;

Route::get('starships', [StarshipController::class, 'index']);
