<?php

declare(strict_types=1);

namespace App\Enums;

enum ModalModeEnum: string
{
    case CREATE = 'create';
    case EDIT = 'edit';
}
