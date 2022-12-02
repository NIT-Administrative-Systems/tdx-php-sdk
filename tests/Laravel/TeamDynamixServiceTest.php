<?php

namespace Northwestern\SysDev\TeamDynamix\Tests\Laravel;

use Lcobucci\JWT\UnencryptedToken;
use Northwestern\Sysdev\TeamDynamix\Laravel\TeamDynamixService;
use Northwestern\SysDev\TeamDynamix\Tests\TestCase;

/**
 * @coversDefaultClass \Northwestern\Sysdev\TeamDynamix\Laravel\TeamDynamixService
 */
class TeamDynamixServiceTest extends TestCase
{
    /**
     * @covers ::applications
     * @covers ::ticket
     * @covers ::ticketType
     * @covers ::ticketStatus
     * @covers ::ticketPriority
     * @covers ::serviceCatalog
     * @covers ::group
     *
     * @covers ::freshLogin
     * @covers ::authToken
     * @covers ::applicationToId
     *
     * @dataProvider getterProvider
     */
    public function testApiGetters(string $getter): void
    {
        $service = $this->createStub(TeamDynamixService::class);
        $service->method('authToken')->willReturn($this->createStub(UnencryptedToken::class));

        $this->assertNotNull($service->$getter());
    }

    public function getterProvider(): array
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
