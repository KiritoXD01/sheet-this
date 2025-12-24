<?php

declare(strict_types=1);

namespace App\Enums;

use App\Traits\HasEnumUtils;

enum UserRoleEnum: string
{
    use HasEnumUtils;

    case ADMIN = 'admin';
    case EMPLOYEE = 'employee';
}
