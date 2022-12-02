<?php

namespace Northwestern\Sysdev\TeamDynamix\Laravel;

use Lcobucci\JWT\UnencryptedToken;
use Northwestern\Sysdev\TeamDynamix\Api\Client\General\Applications;
use Northwestern\Sysdev\TeamDynamix\Api\Client\General\Auth;
use Northwestern\Sysdev\TeamDynamix\Api\Client\General\Group;
use Northwestern\Sysdev\TeamDynamix\Api\Client\SelfService\ServiceCatalog;
use Northwestern\Sysdev\TeamDynamix\Api\Client\TdxClient;
use Northwestern\Sysdev\TeamDynamix\Api\Client\Ticket\Ticket;
use Northwestern\Sysdev\TeamDynamix\Api\Client\Ticket\TicketPriority;
use Northwestern\Sysdev\TeamDynamix\Api\Client\Ticket\TicketStatus;
use Northwestern\Sysdev\TeamDynamix\Api\Client\Ticket\TicketType;
use Northwestern\Sysdev\TeamDynamix\Api\Entity\General\Application;
use Northwestern\Sysdev\TeamDynamix\Api\Errors\ApplicationNotFound;
use Northwestern\Sysdev\TeamDynamix\Api\Types\TdxAppClass;

class TeamDynamixService
{
    private ?UnencryptedToken $authToken = null;

    public function __construct(
        protected string $defaultTicketApplicationName,
        protected string $defaultClientApplicationName,
    ) {
        //
    }

    public function applications(): Applications
    {
        return resolve(Applications::class, ['authToken' => $this->authToken()]);
    }

    public function ticket(?string $applicationName = null): Ticket
    {
        return $this->resolveApiWithApplication(
            apiClass: Ticket::class,
            applicationName: $applicationName ?? $this->defaultTicketApplicationName,
            applicationClass: TdxAppClass::TICKETS
        );
    }

    public function ticketType(?string $applicationName = null): TicketType
    {
        return $this->resolveApiWithApplication(
            apiClass: TicketType::class,
            applicationName: $applicationName ?? $this->defaultTicketApplicationName,
            applicationClass: TdxAppClass::TICKETS
        );
    }

    public function ticketStatus(?string $applicationName = null): TicketStatus
    {
        return $this->resolveApiWithApplication(
            apiClass: TicketStatus::class,
            applicationName: $applicationName ?? $this->defaultTicketApplicationName,
            applicationClass: TdxAppClass::TICKETS
        );
    }

    public function ticketPriority(?string $applicationName = null): TicketPriority
    {
        return $this->resolveApiWithApplication(
            apiClass: TicketPriority::class,
            applicationName: $applicationName ?? $this->defaultTicketApplicationName,
            applicationClass: TdxAppClass::TICKETS
        );
    }

    public function serviceCatalog(?string $applicationName = null): ServiceCatalog
    {
        return $this->resolveApiWithApplication(
            apiClass: ServiceCatalog::class,
            applicationName: $applicationName ?? $this->defaultClientApplicationName,
            applicationClass: TdxAppClass::CLIENT
        );
    }

    public function group(): Group
    {
        return resolve(Group::class, ['authToken' => $this->authToken()]);
    }

    private function resolveApiWithApplication(
        string $apiClass,
        string $applicationName,
        TdxAppClass $applicationClass
    ): TdxClient {
        $applicationName ??= $this->defaultTicketApplicationName;
        $application = $this->applicationToId($applicationName, $applicationClass);

        return resolve($apiClass, [
            'authToken' => $this->authToken(),
            'tdxApplication' => $application,
        ]);
    }

    public function authToken(bool $forceFreshLogin = false): UnencryptedToken
    {
        // @TODO: More caching and stuff
        if (! $this->authToken) {
            $this->authToken = $this->freshLogin();
        }

        return $this->authToken;
    }

    protected function freshLogin(): UnencryptedToken
    {
        /** @var Auth $authApi No auth token needed for what we're going to do */
        $authApi = resolve(Auth::class, ['authToken' => null]);

        return $authApi->login()->authToken;
    }

    protected function applicationToId(string $name, TdxAppClass $class): Application
    {
        $apps = collect($this->applications()->all()->applications);

        $app = $apps->filter(fn (Application $app) => $app->appClass === $class)
            ->filter(fn (Application $app) => strtolower($app->name) == strtolower($name))
            ->first();

        if (! $app) {
            throw ApplicationNotFound::for($class, $name);
        }

        return $app;
    }
}
