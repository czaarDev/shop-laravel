<?php

namespace App\Enums;

enum StatusDeliveryOrderEnum: string
{

    case PENDING = 'Pendente';

    case SENT = 'Enviado';
    case DELIVERED = 'Entregue';

    public static function getDescriptions(): array
    {
        return array_map(
            fn($case) => ['value' => $case->name, 'name' => $case->value],
            self::cases()
        );
    }

    public static function fromName(string $name): string
    {
        foreach (self::cases() as $item) {
            if ($name === $item->name) {
                return $item->value;
            }
        }

        return false;
    }

}


