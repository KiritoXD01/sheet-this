<?php

declare(strict_types=1);

namespace App\DTO;

use App\Enums\PosthogEventEnum;
use Spatie\LaravelData\Dto;

final class PosthogCaptureEventDTO extends Dto
{
    public function __construct(
        public string $distinctId,
        public PosthogEventEnum $event,
    ) {}
}
