<?php

declare(strict_types=1);

namespace App\Services;

use App\DTO\PosthogCaptureEventDTO;
use PostHog\PostHog;

final class PosthogService
{
    public static function capture(PosthogCaptureEventDTO $data): void
    {
        PostHog::capture([
            'distinctId' => $data->distinctId,
            'event' => $data->event->value,
        ]);
    }
}
