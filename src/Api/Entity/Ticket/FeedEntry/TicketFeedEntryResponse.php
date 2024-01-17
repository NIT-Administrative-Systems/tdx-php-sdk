<?php

namespace Northwestern\Sysdev\TeamDynamix\Api\Entity\Ticket\FeedEntry;

use Northwestern\Sysdev\TeamDynamix\Api\Entity\RateLimit;
use Northwestern\Sysdev\TeamDynamix\Api\Entity\Response;

class TicketFeedEntryResponse
{
    public static function fromResponse(Response $response): self
    {
        $feedEntryData = json_decode($response->body, true);

        return new self($response->url, $response->rateLimit, $feedEntryData['ID'], $feedEntryData );
    }

    public function __construct(
        public readonly string $url,
        public readonly RateLimit $rateLimit,
        public readonly int $id,
        public readonly array $data,
    )
    {
        //
    }
}