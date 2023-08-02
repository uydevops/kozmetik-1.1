<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\SiteSettings;

class SiteSettingsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $siteSettings = SiteSettings::all()->pluck('settings_value', 'settings_name')->toArray();

        view()->share('siteSettings', $siteSettings);
        return $next($request);
    }
}
