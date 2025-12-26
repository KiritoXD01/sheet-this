<?php

declare(strict_types=1);

namespace App\Enums;

use Illuminate\Support\Str;

enum WorkWeekDaysEnum: string
{
    case MONDAY = 'monday';
    case TUESDAY = 'tuesday';
    case WEDNESDAY = 'wednesday';
    case THURSDAY = 'thursday';
    case FRIDAY = 'friday';
    case SATURDAY = 'saturday';
    case SUNDAY = 'sunday';

    /**
     * Get the initial of the day
     */
    public function initial(): string
    {
        return Str::of($this->value)->ucfirst()->take(1)->upper()->value();
    }
}
