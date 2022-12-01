<?php

namespace App\Http\Middleware\Permission;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AccessControl
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @param $role
     * @param null $permission
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role, $permission = null): Response|RedirectResponse
    {
        if (!$request->user()->hasRole($role)) abort(403);
        if (!is_null($permission) && !$request->user()->can($permission)) abort(403);
        return $next($request);
    }
}
