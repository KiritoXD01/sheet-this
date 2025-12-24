<?php

declare(strict_types=1);

namespace App\Livewire\Admin\Company;

use App\Enums\IndustryEnum;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;
use WireUi\Traits\WireUiActions;

final class GeneralInformation extends Component
{
    use WireUiActions;

    public Company $company;

    #[Validate(['required', 'string', 'max:255'])]
    public string $name;

    #[Validate(['required'])]
    public IndustryEnum $industry;

    public function mount(): void
    {
        /** @var User */
        $user = Auth::user();

        $this->company = $user->company;
        $this->name = $this->company->name;
        $this->industry = $this->company->industry;
    }

    public function submit(): void
    {
        $this->validate();

        $this->company->update([
            'name' => $this->name,
            'industry' => $this->industry,
        ]);

        $this->notification()->send([
            'icon' => 'success',
            'title' => 'General Information Updated',
            'description' => 'Your company general information has been updated successfully.',
        ]);
    }

    public function render()
    {
        return view('livewire.admin.company.general-information');
    }
}
