<?php

namespace Northwestern\SysDev\TeamDynamix\Tests\Laravel;

use Northwestern\Sysdev\TeamDynamix\Api\ApiConfiguration;
use Northwestern\Sysdev\TeamDynamix\Laravel\TeamDynamixProvider;
use Northwestern\Sysdev\TeamDynamix\Laravel\TeamDynamixService;
use Northwestern\SysDev\TeamDynamix\Tests\TestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(TeamDynamixProvider::class)]
class TeamDynamixProviderTest extends TestCase
{
    public function testRegistered(): void
    {
        /** @var ApiConfiguration $config */
        $config = resolve(ApiConfiguration::class);

        /** @var TeamDynamixService $service */
        $service = resolve(TeamDynamixService::class);

        $this->assertEquals($config->username, 'phpunit');
        $this->assertNotNull($service);
    }
}
