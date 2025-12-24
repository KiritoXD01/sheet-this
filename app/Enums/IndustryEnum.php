<?php

declare(strict_types=1);

namespace App\Enums;

use App\Traits\HasEnumUtils;
use Illuminate\Support\Str;

enum IndustryEnum: string
{
    use HasEnumUtils;
    case TECHNOLOGY = 'technology';
    case FINANCE = 'finance';
    case HEALTHCARE = 'healthcare';
    case RETAIL = 'retail';
    case OTHER = 'other';

    public function label(): string
    {
        return Str::title($this->value);
    }
}
