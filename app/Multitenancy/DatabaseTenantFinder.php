<?php

namespace App\Multitenancy;

use Illuminate\Http\Request;
use Spatie\Multitenancy\TenantFinder\TenantFinder;
use App\Models\Tenant;

class DatabaseTenantFinder extends TenantFinder
{
    public function findForRequest(Request $request): ?\Spatie\Multitenancy\Models\Tenant
    {
        // Get the current database name from the environment
        $database = env('DB_DATABASE');

        // Find the tenant by its database name
        //return Tenant::where('database', $database)->first();
        return Tenant::where('database', 'tenant1_db')->first(); // Hardcoded for testing

    }
}
