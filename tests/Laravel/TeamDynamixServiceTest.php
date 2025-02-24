<?php

namespace Northwestern\SysDev\TeamDynamix\Tests\Laravel;

use Lcobucci\JWT\UnencryptedToken;
use Northwestern\Sysdev\TeamDynamix\Laravel\TeamDynamixService;
use Northwestern\SysDev\TeamDynamix\Tests\TestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;

#[CoversClass(TeamDynamixService::class)]
class TeamDynamixServiceTest extends TestCase
{
    #[DataProvider('getterProvider')]
    public function testApiGetters(string $getter): void
    {
        $service = $this->createStub(TeamDynamixService::class);
        $service->method('authToken')->willReturn($this->createStub(UnencryptedToken::class));

        $this->assertNotNull($service->$getter());
    }

    public static function getterProvider(): array
    {
        return [
            ['applications'],
            ['ticket'],
            ['ticketType'],
            ['ticketStatus'],
            ['ticketPriority'],
            ['serviceCatalog'],
            ['group'],
        ];
    }
}
