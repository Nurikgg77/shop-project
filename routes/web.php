<?php

use App\Http\Controllers\CatalogController;

Route::get('/', [CatalogController::class, 'index'])->name('home');

