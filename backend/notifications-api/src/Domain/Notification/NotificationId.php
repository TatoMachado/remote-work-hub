<?php

namespace App\Domain\Notification;

final class NotificationId
{
    public function __construct(
        private string $value
    ) {
    }

    public static function generate(): self
    {
        // ID simples em hexa, suficiente para o projeto.
        return new self(bin2hex(random_bytes(16)));
    }

    public static function fromString(string $value): self
    {
        return new self($value);
    }

    public function value(): string
    {
        return $this->value;
    }
}
