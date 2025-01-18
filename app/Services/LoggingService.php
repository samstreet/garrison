<?php

declare(strict_types=1);

namespace App\Services;

final class LoggingService
{
    public static function info(string $message): void
    {
        logger()->info(get_called_class(), ['message' => $message]);
    }

    public static function error(string $message): void
    {
        logger()->error(get_called_class(), ['message' => $message]);
    }
}
