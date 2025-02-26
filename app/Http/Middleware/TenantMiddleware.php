<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Spatie\Multitenancy\Multitenancy;
use App\Models\Tenant;

class TenantMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $tenant = Tenant::where('database', $request->getHost())->first();

        if ($tenant) {
            $tenant->makeCurrent();
        }

        return $next($request);
    }
}
