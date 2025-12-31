<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;
use PostHog\PostHog;

final class AppServiceProvider extends ServiceProvider
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
        Password::defaults(function () {
            $rule = Password::min(8);

            return app()->isProduction()
                ? $rule->mixedCase()->uncompromised()
                : $rule;
        });

        $posthogConfig = config('services.posthog');

        PostHog::init(
            apiKey: $posthogConfig['api_key'],
            options: [
                'host' => $posthogConfig['host'],
            ]
        );
    }
}
