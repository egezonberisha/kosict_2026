# Production Confessions · KosICT 2026

Anonymous confessions from developers who've seen things. Built live at [KosICT 2026](https://kosict.com) (15th edition, October 9–10, 2026, Prishtina) and deployed with [Laravel Cloud](https://cloud.laravel.com).

Laravel 13 · Blade · Tailwind CSS 4 · Vite.

## Local development

```sh
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate
composer run dev
```

Local development uses SQLite.

## Deploying to Laravel Cloud

Connect this repository to a Laravel Cloud application and deploy the `main` branch.

- **Build command:** `composer install --no-dev && npm run build`
- **Deploy command:** `php artisan migrate --force`

The landing page is stateless and doesn't need a database. When a Laravel Cloud MySQL database is attached, Cloud injects the `DB_*` connection variables automatically. No credentials are stored in this repository.

## Tests

```sh
php artisan test
```

KosICT logo © KosICT. Laravel and Laravel Cloud marks © Laravel Holdings Inc.
