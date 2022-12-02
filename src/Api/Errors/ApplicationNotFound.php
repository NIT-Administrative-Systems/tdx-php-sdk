<?php

namespace Northwestern\Sysdev\TeamDynamix\Api\Errors;

use Exception;
use Northwestern\Sysdev\TeamDynamix\Api\Types\TdxAppClass;

final class ApplicationNotFound extends Exception
{
    public static function for(TdxAppClass $searchClass, string $searchName): self
    {
        return new self(sprintf('Application %s (AppClass = %s) not found', $searchName, $searchClass->value));
    }
}
