<?php

declare(strict_types=1);

namespace App\Providers;

use App\Enum\Versions;
use Illuminate\Support\ServiceProvider;

final class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        if (! defined('DEFAULT_VERSION')) {
            define('DEFAULT_VERSION', Versions::VERSION_2X->value);
        }
    }

    public function boot(): void
    {
        //
    }
}
