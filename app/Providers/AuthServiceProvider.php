<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Produto;
use App\Models\Categoria;




class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    protected $polices = [
        'App\Models\Produto' => 'App\Policies\ProdutosPolicy',
    ];

    public function boot(): void
    {
        $this -> tegisterPolicies();
        Gate::define('ver-produto', function (User $user,Produto $produto) {
            return $user ->id == $produto ->id_user;
        });
    }
}