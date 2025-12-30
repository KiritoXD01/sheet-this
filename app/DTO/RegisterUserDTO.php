<?php

declare(strict_types=1);

namespace App\DTO;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;

final class RegisterUserDTO extends Data
{
    public function __construct(
        #[MapInputName('full_name')]
        public string $fullName,
        public string $email,
        public string $password
    ) {}
}
