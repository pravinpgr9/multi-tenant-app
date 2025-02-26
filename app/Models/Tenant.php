<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\Multitenancy\Models\Tenant as BaseTenant;

use Spatie\Multitenancy\Models\Concerns\UsesLandlordConnection;

class Tenant extends BaseTenant
{
    use UsesLandlordConnection;

    protected $fillable = ['name', 'database'];

    public function getDatabaseName(): string
    {
        return $this->database;
    }

    public function configure()
    {
        config()->set('database.connections.tenant', [
            'driver' => 'mysql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => $this->database,
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),
        ]);

        app(\Spatie\Multitenancy\TenantFinder\TenantFinder::class)->findForRequest();
    }
}
