<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\Tenant;

class CreateTenantDatabase extends Command
{
    protected $signature = 'tenant:create-database {name}';
    protected $description = 'Create a new database for a tenant';

    public function handle()
    {
        $tenantName = $this->argument('name');
        $databaseName = 'tenant_' . strtolower($tenantName) . '_db';

        DB::statement("CREATE DATABASE $databaseName");
        $this->info("Database '$databaseName' created successfully!");

        // Store in tenants table
        Tenant::create([
            'name' => $tenantName,
            'database' => $databaseName,
        ]);

        $this->info("Tenant entry added.");
    }
}
