<?php

namespace Northwestern\Sysdev\TeamDynamix\Laravel;

use Illuminate\Support\ServiceProvider;
use Northwestern\Sysdev\TeamDynamix\Api\ApiConfiguration;

class TeamDynamixProvider extends ServiceProvider
{
    const CONFIG_PATH = __DIR__.'/../../config/team-dynamix.php';

    public function register(): void
    {
        $this->mergeConfigFrom(self::CONFIG_PATH, 'team-dynamix');

        $this->app->singleton(ApiConfiguration::class, fn () => new ApiConfiguration(
            baseUrl: (string) config('team-dynamix.apiBaseUrl'),
            username: (string) config('team-dynamix.auth.username'),
            password: (string) config('team-dynamix.auth.password'),
        ));

        $this->app->singleton(TeamDynamixService::class, fn () => new TeamDynamixService(
            defaultTicketApplicationName: (string) config('team-dynamix.apps.ticketing'),
            defaultClientApplicationName: (string) config('team-dynamix.apps.client'),
        ));
    }

    public function boot(): void
    {
        $this->publishes([
            self::CONFIG_PATH => config_path('team-dynamix.php'),
        ], 'team-dynamix');
    }
}
