<?php

namespace App\Application\Notification;

class SendNotificationCommand
{
    public function __construct(
        public string $recipient,
        public string $message,
        public string $channel
    ) {
    }
}
