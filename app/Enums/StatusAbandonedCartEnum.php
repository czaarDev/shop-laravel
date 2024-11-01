<?php

namespace App\Enums;

enum StatusAbandonedCartEnum: string
{
    case PENDING = 'pending';
    case CONVERTED = 'converted';

    public static function getDescription(mixed $value): string
    {
        return match ($value) {
            self::PENDING   => 'Pendente',
            self::CONVERTED => 'Convertido',
            default         => 'Pendente',
        };
    }

    public static function getClass(mixed $value): string
    {
        return match ($value) {
            self::PENDING   => 'warning',
            self::CONVERTED => 'success',
            default         => 'warning',
        };
    }

}
