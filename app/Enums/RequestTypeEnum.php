<?php

declare(strict_types=1);

namespace App\Enums;

use App\Traits\HasEnumUtils;

enum RequestTypeEnum: string
{
    use HasEnumUtils;

    case VACATIONS = 'vacations';
    case SICK_LEAVE = 'sick_leave';
    case UNPAID_LEAVE = 'unpaid_leave';
}
