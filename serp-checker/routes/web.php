<?php

use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SearchController::class, 'index'])->name('search.index');
Route::post('/search', [SearchController::class, 'store'])->name('search.store');
