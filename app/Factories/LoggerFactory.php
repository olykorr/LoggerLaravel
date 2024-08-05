<?php

namespace App\Factories;

use App\Contracts\LoggerInterface;
use App\Сomponents\Loggers\EmailLogger;
use App\Сomponents\Loggers\FileLogger;
use App\Сomponents\Loggers\DbLogger;
use Illuminate\Support\Facades\Config;

class LoggerFactory
{
    public static function createLogger(string $type): LoggerInterface
    {
        $config = Config::get('logger');

        switch ($type) {
            case 'email':
                return new EmailLogger($config['email']);
            case 'file':
                return new FileLogger();
            case 'db':
                return new DbLogger();
            default:
                throw new \InvalidArgumentException("Unknown logger type: {$type}");
        }
    }
}
