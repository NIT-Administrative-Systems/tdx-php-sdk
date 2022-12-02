<?php

namespace Northwestern\Sysdev\TeamDynamix\Api\Entity\General;

use Lcobucci\JWT\Encoding\JoseEncoder;
use Lcobucci\JWT\Token\Parser;
use Lcobucci\JWT\UnencryptedToken;
use Northwestern\Sysdev\TeamDynamix\Api\Entity\RateLimit;
use Northwestern\Sysdev\TeamDynamix\Api\Entity\Response;

class AuthResponse
{
    public static function fromResponse(Response $response): self
    {
        $parser = new Parser(new JoseEncoder());
        $jwt = $parser->parse($response->body);

        return new self($response->url, $response->rateLimit, $jwt);
    }

    public function __construct(
        public readonly string $url,
        public readonly RateLimit $rateLimit,
        public readonly UnencryptedToken $authToken
    ) {
        //
    }
}
