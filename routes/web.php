<?php

use Illuminate\Support\Facades\Route;
use Spatie\Multitenancy\Models\Tenant;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::middleware(['web'])->group(function () {
//     Route::get('/', function () {
//         return 'Main Landing Page';
//     });

//     Route::domain('{tenant}.localhost')->group(function () {
//         Route::get('/', function () {
//             return 'You are inside Tenant: ' . tenant()->name;
//         });

//         Route::resource('books', \App\Http\Controllers\BookController::class);
//     });
// });


use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains; 

Route::middleware(['web'])->group(function () {
    Route::get('/', function () {
        return 'Main Landing Page';
    });

    // Tenant Routes
    Route::middleware([
        InitializeTenancyByDomain::class,  // Resolves tenant by domain
        PreventAccessFromCentralDomains::class // Prevents central domain access
    ])->group(function () {
        Route::get('/', function () {
            return 'You are inside Tenant: ' . tenant()->id; // Using tenant() safely
        });

        Route::resource('books', \App\Http\Controllers\BookController::class);
    });
});

Route::middleware(['tenant'])->group(function () {
    Route::get('/', function () {
        return 'Tenant-Specific Dashboard';
    });
});