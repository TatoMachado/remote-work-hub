<?php

namespace App\Infrastructure\Notification;

use App\Domain\Notification\Notification;
use App\Domain\Notification\NotificationRepository;

class InMemoryNotificationRepository implements NotificationRepository
{
    /** @var Notification[] */
    private array $items = [];

    public function save(Notification $notification): void
    {
        $this->items[$notification->id()->value()] = $notification;
    }
}
