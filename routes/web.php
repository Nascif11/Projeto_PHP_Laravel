<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use Illuminate\Http\Request;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LoginController;
Route::resource('produtos', ProdutoController::class);

Route::get('/',[SiteController::class,'index'])->name('site.index');

Route::get('/produto/{slug}',[SiteController::class,'details'])->name('site.details');

Route::get('/categoria/{id}',[SiteController::class,'categoria'])->name('site.categoria');

Route::view('/login','login.form')->name('login.form');
Route::post('/auth',[LoginController::class, 'auth'])->name('login.auth');

Route::get('/admin/dashboard',[DashboardController::class,'index'])->name('admin.dashboard');