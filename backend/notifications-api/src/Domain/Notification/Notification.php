<?php

namespace App\Domain\Notification;

use DateTimeImmutable;

class Notification
{
    private function __construct(
        private NotificationId $id,
        private string $recipient,
        private string $message,
        private NotificationChannel $channel,
        private DateTimeImmutable $createdAt
    ) {
    }

    public static function create(
        string $recipient,
        string $message,
        NotificationChannel $channel
    ): self {
        if ($recipient === '' || $message === '') {
            throw new \InvalidArgumentException('Recipient and message must not be empty');
        }

        return new self(
            NotificationId::generate(),
            $recipient,
            $message,
            $channel,
            new DateTimeImmutable()
        );
    }

    public function id(): NotificationId
    {
        return $this->id;
    }

    public function recipient(): string
    {
        return $this->recipient;
    }

    public function message(): string
    {
        return $this->message;
    }

    public function channel(): NotificationChannel
    {
        return $this->channel;
    }

    public function createdAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }
}
