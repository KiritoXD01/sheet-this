<?php

declare(strict_types=1);

use Illuminate\Support\Str;

enum IndustryEnum: string
{
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
