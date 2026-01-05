<?php

use App\Http\Controllers\CatalogController;

Route::get('/', [CatalogController::class, 'index']);
Route::get('/category/{category}', [CatalogController::class, 'category'])->name('category.show');



