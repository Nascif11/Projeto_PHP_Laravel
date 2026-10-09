<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckEmail
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            return redirect()->route('login.form');
        }

        $email = auth()->user()->email;
        $data = explode('@', $email);
        $servidorEmail = $data[1] ?? '';


        return $next($request);
    }
}