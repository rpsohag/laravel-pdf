<?php

use App\Http\Controllers\PdfController;
use Illuminate\Support\Facades\Route;

Route::get('/example-one', [PdfController::class, 'example_one'])->name('example_one');
