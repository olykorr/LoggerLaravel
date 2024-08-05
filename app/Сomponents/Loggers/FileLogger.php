<?php


namespace App\Сomponents\Loggers;

use App\Contracts\LoggerInterface;

class FileLogger implements LoggerInterface
{
    private $type = 'file';

    public function send(string $message): void
    {
        echo "{$message} was sent via file\n";
    }

    public function sendByLogger(string $message, string $loggerType): void
    {
        if ($loggerType === $this->type) {
            $this->send($message);
        }
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }
}
