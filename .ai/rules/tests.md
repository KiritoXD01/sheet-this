---
paths:
  - 'tests/**'
---

# Tests

## Feature tests skip Vite; browser checks need php -S from public/
tests/Pest.php calls `$this->withoutVite()` for every Feature test, so Inertia page tests never depend on `npm run build`. For a real browser check, `php artisan serve` drops custom env vars (DB_CONNECTION etc.) from its worker, so to run against a throwaway SQLite DB start the server as `cd public && DB_CONNECTION=sqlite DB_DATABASE=/abs/path.sqlite SESSION_DRIVER=file CACHE_STORE=file php -S 127.0.0.1:8010 ../vendor/laravel/framework/src/Illuminate/Foundation/resources/server.php` (the router script requires index.php relative to cwd). Guests redirect to /login and logged-in users to /dashboard (bootstrap/app.php).
