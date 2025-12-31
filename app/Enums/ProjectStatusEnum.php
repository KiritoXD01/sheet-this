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
}
