# Multi-Tenant Laravel 10 Application

This is a multi-tenant Laravel 10 application built with the Filament admin panel and Spatie's Multitenancy package. Each tenant has its own database, ensuring data isolation and scalability.

## Features
- Multi-tenancy using [Spatie's Laravel Multitenancy](https://github.com/spatie/laravel-multitenancy)
- Admin panel with [Filament](https://filamentphp.com/)
- Authentication with Laravel Sanctum
- REST API support
- Database-per-tenant architecture
- Laravel 10 framework

## Requirements
- PHP ^8.1
- Composer
- MySQL or PostgreSQL
- Redis (optional but recommended for caching)

## Installation

### Clone the Repository
```bash
git clone https://github.com/yourusername/multi-tenant-app-2025.git
cd multi-tenant-app-2025
```

### Install Dependencies
```bash
composer install
```

### Environment Setup
```bash
cp .env.example .env
```
Update the `.env` file with your database credentials.

### Generate Application Key
```bash
php artisan key:generate
```

### Run Migrations
```bash
php artisan migrate
```

### Set Up Tenancy
```bash
php artisan tenants:artisan migrate --tenant
```

### Start the Development Server
```bash
php artisan serve
```

## Usage
- To create a new tenant:
  ```bash
  php artisan tenant:create example.com
  ```
- To switch to a tenant and run commands for it:
  ```bash
  php artisan tenants:artisan migrate --tenant
  ```

## Testing
```bash
php artisan test
```

## License
This project is licensed under the MIT License.

## Contributors
- [Your Name](https://github.com/yourusername)

