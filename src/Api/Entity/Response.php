<?php

namespace Northwestern\Sysdev\TeamDynamix\Api\Entity;

class Response
{
    public function __construct(
        public readonly string $url,
        public readonly RateLimit $rateLimit,
        public readonly mixed $body,
    ) {
        //
    }
}
