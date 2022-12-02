<?php

namespace Northwestern\Sysdev\TeamDynamix\Api\Entity\Ticket;

class Ticket
{
    public function __construct(
        public readonly int $id,
        public readonly array $data,
    ) {
        //
    }
}
