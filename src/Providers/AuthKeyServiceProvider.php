<?php

namespace Ryanaby\LumenAuthKey\Providers;

use Illuminate\Support\ServiceProvider;
use Ryanaby\LumenAuthKey\Http\Middleware\VerifyApiKey;

class AuthKeyServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->routeMiddleware([
            'auth.apikey' => VerifyApiKey::class,
        ]);
    }
}
