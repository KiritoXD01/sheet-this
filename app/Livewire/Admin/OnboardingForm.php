<?php

declare(strict_types=1);

namespace App\Livewire\Admin;

use App\Enums\IndustryEnum;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

final class OnboardingForm extends Component
{
    #[Validate(['required', 'string', 'max:255'])]
    public string $name = '';

    #[Validate(['required'])]
    public IndustryEnum $industry;

    public function submit(): void
    {
        $this->validate();

        Company::query()->create([
            'name' => $this->name,
            'industry' => $this->industry,
            'owner_id' => Auth::id(),
        ]);

        redirect()->route('admin.index');
    }

    public function render()
    {
        return view('livewire.admin.onboarding-form');
    }
}
