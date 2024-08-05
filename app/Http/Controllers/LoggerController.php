<?php

namespace App\Http\Controllers;

use App\Factories\LoggerFactory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoggerController extends Controller
{
    public function log()
    {
        $message = "This is a log message";
        $loggerType = config('logger.default');
        $logger = LoggerFactory::createLogger($loggerType);
        $logger->send($message);
    }

    public function logTo($type)
    {
        $message = "This is a log message to specific logger";
        $logger = LoggerFactory::createLogger($type);
        $logger->send($message);
    }

    public function logToAll()
    {
        $message = "This is a log message to all loggers";
        $loggers = ['email', 'file', 'db'];

        foreach ($loggers as $loggerType) {
            $logger = LoggerFactory::createLogger($loggerType);
            $logger->send($message);
        }
    }
}

