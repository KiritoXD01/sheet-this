<?php

declare(strict_types=1);

namespace App\Enums;

use App\Traits\HasEnumUtils;

enum RequestStatusEnum: string
{
    use HasEnumUtils;

    case PENDING = 'pending';
    case APPROVED = 'approved';
    case REJECTED = 'rejected';
    case CANCELLED = 'cancelled';

    public function bgColor(): string
    {
        return match ($this) {
            self::PENDING => 'bg-yellow-100 dark:bg-yellow-900/20',
            self::APPROVED => 'bg-green-100 dark:bg-green-900/20',
            self::REJECTED => 'bg-red-100 dark:bg-red-900/20',
            self::CANCELLED => 'bg-gray-100 dark:bg-gray-900/20',
        };
    }

    public function textColor(): string
    {
        return match ($this) {
            self::PENDING => 'text-yellow-700 dark:text-yellow-400',
            self::APPROVED => 'text-green-700 dark:text-green-400',
            self::REJECTED => 'text-red-700 dark:text-red-400',
            self::CANCELLED => 'text-gray-700 dark:text-gray-400',
        };
    }

    public function dotColor(): string
    {
        return match ($this) {
            self::PENDING => 'bg-yellow-500',
            self::APPROVED => 'bg-green-500',
            self::REJECTED => 'bg-red-500',
            self::CANCELLED => 'bg-gray-500',
        };
    }

    public function label(): string
    {
        return match ($this) {
            self::PENDING => 'Pending',
            self::APPROVED => 'Approved',
            self::REJECTED => 'Rejected',
            self::CANCELLED => 'Cancelled',
        };
    }
}
