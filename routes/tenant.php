<?php 


use Illuminate\Support\Facades\Route;

Route::middleware(['web', 'tenant'])->group(function () {
    Route::get('/', function () {
        return 'Welcome to Tenant: ' . tenant('id'); // Verify if the tenant is resolved
    });
});
