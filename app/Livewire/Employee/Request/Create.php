<?php

declare(strict_types=1);

namespace App\Livewire\Employee\Request;

use App\Enums\RequestStatusEnum;
use App\Enums\RequestTypeEnum;
use App\Models\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Enum;
use Livewire\Attributes\Validate;
use Livewire\Component;
use WireUi\Traits\WireUiActions;

final class Create extends Component
{
    use WireUiActions;

    #[Validate(['required', new Enum(RequestTypeEnum::class)])]
    public RequestTypeEnum $request_type;

    #[Validate(['required', 'date', 'after_or_equal:today'])]
    public Carbon $start_date;

    #[Validate(['required', 'date', 'after:start_date'])]
    public Carbon $end_date;

    #[Validate('nullable', 'string', 'max:500')]
    public ?string $notes = null;

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

        /** @var User */
        $user = Auth::user();

        Request::query()
            ->create([
                'employee_id' => $user->employee->id,
                'request_type' => $this->request_type,
                'start_date' => $this->start_date,
                'end_date' => $this->end_date,
                'notes' => $this->notes,
                'status' => RequestStatusEnum::PENDING,
            ]);

        $this->notification()->send([
            'icon' => 'success',
            'title' => 'Request Submitted',
            'description' => 'Your request has been submitted successfully.',
        ]);

        $this->reset();
    }
}
