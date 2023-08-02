<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class SiteSettingsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $siteSettings = SiteSettings::all()->pluck('settings_value', 'settings_name')->toArray();

        view()->share('siteSettings', $siteSettings);
    }
}
