<?php

namespace App\Application\Notification;

use App\Domain\Notification\Notification;
use App\Domain\Notification\NotificationChannel;
use App\Domain\Notification\NotificationRepository;

class SendNotificationHandler
{
    public function __construct(
        private NotificationRepository $repository
    ) {
    }

    public function handle(SendNotificationCommand $command): Notification
    {
        $channel = new NotificationChannel($command->channel);

        $notification = Notification::create(
            $command->recipient,
            $command->message,
            $channel
        );

        $this->repository->save($notification);

        return $notification;
    }
}
