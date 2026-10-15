<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use Illuminate\Http\Request;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
//Route::resource('produtos', ProdutoController::class);

Route::get('/',[SiteController::class,'index'])->name('site.index');

Route::get('/produto/{slug}',[SiteController::class,'details'])->name('site.details');

Route::get('/categoria/{id}',[SiteController::class,'categoria'])->name('site.categoria');

Route::view('/login','login.form')->name('login.form');
Route::post('/auth',[LoginController::class, 'auth'])->name('login.auth');

Route::get('/admin/dashboard', [DashboardController::class, 'index'])
    ->middleware([
        'auth',
        \App\Http\Middleware\CheckEmail::class
    ])
    ->name('admin.dashboard');
Route::get('/logout',[LoginController::class,'logout'])->name('login.logout');
Route::get('/register', [LoginController::class, 'create'])->name('login.create');

Route::get('/users', [UserController::class, 'index'])->name('users.index');

Route::post('/users', [UserController::class, 'store'])->name('user.store');

Route::get('/admin/produtos',[ProdutoController::class, 'index'])->name('admin.produtos');

Route::delete('/admin/produto/delete/{id}',[ProdutoController::class,'destroy'])->name('admin.delete');

Route::get('/admin/produtos/create', [ProdutoController::class, 'create'])
    ->name('admin.produtos.create');


