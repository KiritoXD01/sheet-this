<?php

declare(strict_types=1);

namespace App\Livewire\Employee\Request;

use App\Enums\RequestTypeEnum;
use Illuminate\Support\Arr;
use Livewire\Attributes\Validate;
use Livewire\Component;

final class Create extends Component
{
    #[Validate(['required'])]
    public RequestTypeEnum $request_type;

    public string $start_date;

    public string $end_date;

    public string $notes = '';

    public function render()
    {
        $requestTypes = Arr::map(
            array: RequestTypeEnum::cases(),
            callback: fn (RequestTypeEnum $type) => [
                'value' => $type->value,
                'label' => $type->label(),
            ]
        );

        return view('livewire.employee.request.create', [
            'request_types' => $requestTypes,
        ]);
    }

    public function save(): void
    {
        $this->validate();
    }
}
