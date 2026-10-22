<?php

use App\Http\Controllers\ShoeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ShoeController::class, 'index'])->name('shoes.index');
Route::get('/shoes/{shoe}', [ShoeController::class, 'show'])->name('shoes.show');
