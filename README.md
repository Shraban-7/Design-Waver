# Design Waver

A Laravel-based web application for a design-oriented business workflow, combining an AdminLTE dashboard, shopping-cart functionality, authentication, document generation, and reactive Livewire interfaces.

## Why This Project Matters

This repository demonstrates practical Laravel application development beyond basic CRUD, including **admin dashboards, cart workflows, server-side document generation, authentication, reactive UI, and API-ready application structure**.

## Tech Stack

- PHP 8.1+
- Laravel 10
- Livewire 2
- Laravel Sanctum
- Laravel Breeze
- AdminLTE 3
- Laravel DomPDF
- Darryldecode Cart
- Guzzle
- Pest
- Laravel Sail

## Key Engineering Areas

- Authentication and protected application areas
- Admin dashboard workflows
- Shopping cart state and product workflows
- Livewire reactive components
- PDF generation
- HTTP/API integrations
- Database migrations, seeders, and factories
- Automated testing setup with Pest

## Run Locally

```bash
git clone https://github.com/Shraban-7/Design-Waver.git
cd Design-Waver
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
npm install
npm run build
php artisan serve
```

## Project Structure

```text
app/
├── Http/
├── Livewire/
├── Models/
└── Services/

database/
├── factories/
├── migrations/
└── seeders/

tests/
```

## Status

An earlier Laravel 10 project demonstrating business-application patterns and full-stack Laravel development. My current focus is modern, backend-focused Laravel engineering with stronger testing, API design, performance, queues, and deployment practices.

## Author

**Shraban Hossain**

- GitHub: https://github.com/Shraban-7
- Portfolio: https://www.devshraban.com/
- LinkedIn: https://www.linkedin.com/in/shakuat-shraban/
