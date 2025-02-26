<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\Tenant;
use Spatie\Multitenancy\Multitenancy;
use Spatie\Multitenancy\Resolvers\CurrentTenantResolver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //Multitenancy::tenantFinder(fn () => Tenant::where('database', 'tenant1_database')->first());

        // CurrentTenantResolver::set(function () {
        //     return Tenant::where('database', env('DB_DATABASE'))->first();
        // });

    //     Multitenancy::resolveTenantUsing(function () {
    //     return Tenant::where('database', 'tenant1_database')->first();
    // });

    }
}
