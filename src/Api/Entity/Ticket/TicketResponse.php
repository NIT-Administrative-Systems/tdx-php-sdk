<?php

namespace Northwestern\Sysdev\TeamDynamix\Api\Entity\Ticket;

use Northwestern\Sysdev\TeamDynamix\Api\Entity\RateLimit;
use Northwestern\Sysdev\TeamDynamix\Api\Entity\Response;

class TicketResponse
{
    public static function fromResponse(Response $response): self
    {
        $ticketData = json_decode($response->body, true);

        $ticket = new Ticket($ticketData['ID'], $ticketData);

        return new self($response->url, $response->rateLimit, $ticket);
    }

    public function __construct(
        public readonly string $url,
        public readonly RateLimit $rateLimit,
        public readonly Ticket $ticket,
    ) {
        //
    }
}
