<?php

declare(strict_types=1);

namespace App\Enums;

use App\Traits\HasEnumUtils;

enum ProjectStatusEnum: string
{
    use HasEnumUtils;

    case ACTIVE = 'active';
    case ON_HOLD = 'on_hold';
    case PLANNING = 'planning';
    case COMPLETED = 'completed';

    public function label(): string
    {
        return match ($this) {
            self::ACTIVE => 'Active',
            self::ON_HOLD => 'On Hold',
            self::PLANNING => 'Planning',
            self::COMPLETED => 'Completed',
        };
    }
}
