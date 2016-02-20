<?php

namespace FRD\Http\Middleware;

use Closure;
use FRD\User;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthAdmin
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if (!$this->auth->check() or $this->auth->user()->is_admin <> 1) {
            $this->auth->logout();
            Session::flash('msg', 'Acesso restrito a administradores');
            return redirect('/auth/login');
        }

        return $next($request);
    }
}
