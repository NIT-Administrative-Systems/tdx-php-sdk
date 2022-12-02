<?php

namespace Northwestern\SysDev\TeamDynamix\Tests;

use Northwestern\Sysdev\TeamDynamix\Laravel\TeamDynamixProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    /**
     * {@inheritDoc}
     */
    protected function getPackageProviders($app)
    {
        return [
            TeamDynamixProvider::class,
        ];
    }

    protected function defineEnvironment($app)
    {
        // Setup default database to use sqlite :memory:
        $app['config']->set('team-dynamix', [
            'apiBaseUrl' => 'https://localhost',
            'auth' => [
                'username' => 'phpunit',
                'password' => 'pHpUnIt',
            ],
            'apps' => [
                'ticketing' => 'Default',
                'client' => 'Default',
            ],
        ]);
    }
}
