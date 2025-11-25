<?php

namespace App\Domain\Notification;

final class NotificationChannel
{
    public const EMAIL = 'email';
    public const SMS = 'sms';

    public function __construct(
        private string $value
    ) {
        if (!in_array($value, [self::EMAIL, self::SMS], true)) {
            throw new \InvalidArgumentException('Invalid notification channel');
        }
    }

    public function value(): string
    {
        return $this->value;
    }
}
