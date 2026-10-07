<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use Illuminate\Http\Request;

Route::resource('produtos', ProdutoController::class);
