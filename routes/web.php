<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use Illuminate\Http\Request;
use App\Http\Controllers\SiteController;

Route::resource('produtos', ProdutoController::class);

Route::get('/',[SiteController::class,'index'])->name('site.index');

Route::get('/produto/{slug}',[SiteController::class,'details'])->('site.details');