<?php

namespace Northwestern\Sysdev\TeamDynamix\Api\Entity\General;

use Northwestern\Sysdev\TeamDynamix\Api\Types\TdxAppClass;

class Application
{
    public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly TdxAppClass|string $appClass,
    ) {
        //
    }
}
