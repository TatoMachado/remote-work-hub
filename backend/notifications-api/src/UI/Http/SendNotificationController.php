<?php

namespace App\UI\Http;

use App\Application\Notification\SendNotificationCommand;
use App\Application\Notification\SendNotificationHandler;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class SendNotificationController
{
    public function __construct(
        private SendNotificationHandler $handler
    ) {
    }

    public function __invoke(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true) ?? [];

        $command = new SendNotificationCommand(
            $data['recipient'] ?? '',
            $data['message'] ?? '',
            $data['channel'] ?? 'email'
        );

        $notification = $this->handler->handle($command);

        return new JsonResponse([
            'id' => $notification->id()->value(),
            'recipient' => $notification->recipient(),
            'message' => $notification->message(),
            'channel' => $notification->channel()->value(),
            'created_at' => $notification->createdAt()->format(DATE_ATOM),
        ], 202);
    }
}
