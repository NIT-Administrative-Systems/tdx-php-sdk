<?php

namespace Northwestern\Sysdev\TeamDynamix\Api\Client\General;

use Northwestern\Sysdev\TeamDynamix\Api\Client\TdxClient;
use Northwestern\Sysdev\TeamDynamix\Api\Entity\Response;

class Group extends TdxClient
{
    public function search(string $nameLike): Response
    {
        return $this->post('/api/groups/search', [
            'NameLike' => $nameLike,
        ]);
    }
}
