<?php

namespace App\Providers;

use Illuminate\Http\Request;
use Spatie\Multitenancy\TenantFinder\TenantFinder;
use Spatie\Multitenancy\Models\Tenant;

class QueryParameterTenantFinder extends TenantFinder
{
    public function findForRequest(Request $request): ?Tenant
    {
        // Get tenant_id from query parameter
        $tenantId = $request->query('tenant_id');

        if (!$tenantId) {
            return null; // No tenant selected
        }

        // Find and return the tenant by ID
        return Tenant::find($tenantId);
    }
}