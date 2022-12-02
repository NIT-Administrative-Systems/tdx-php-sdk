<?php

namespace Northwestern\Sysdev\TeamDynamix\Api\Entity\General;

use Northwestern\Sysdev\TeamDynamix\Api\Entity\RateLimit;
use Northwestern\Sysdev\TeamDynamix\Api\Entity\Response;
use Northwestern\Sysdev\TeamDynamix\Api\Types\TdxAppClass;

class AllApplicationsResponse
{
    public static function fromResponse(Response $response): self
    {
        $appData = json_decode($response->body, true);

        $apps = [];
        foreach ($appData as $app) {
            $apps[] = new Application(
                id: $app['AppID'],
                name: $app['Name'],
                appClass: TdxAppClass::tryFrom($app['AppClass']) ?? $app['AppClass'],
            );
        }

        return new self($response->url, $response->rateLimit, $apps);
    }

    /**
     * @param  array<Application>  $applications
     */
    public function __construct(
        public readonly string $url,
        public readonly RateLimit $rateLimit,
        public readonly array $applications,
    ) {
        //
    }
}
