<?php


namespace App\Сomponents\Loggers;


use App\Contracts\LoggerInterface;

class EmailLogger implements LoggerInterface
{
    private $type = 'email';
    private $email;

    public function __construct($email)
    {
        $this->email = $email;
    }

    public function send(string $message): void
    {
        echo "{$message} was sent via email to {$this->email}\n";
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
