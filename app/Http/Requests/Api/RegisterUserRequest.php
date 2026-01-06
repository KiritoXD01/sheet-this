<?php

declare(strict_types=1);

namespace App\Http\Requests\Api;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

final class RegisterUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Allow requests in non-production environments
        if (! app()->isProduction()) {
            return true;
        }

        $origin = $this->header('Origin');
        $referer = $this->header('Referer');

        // Check if Origin or Referer header contains sheetthis.com domain
        if ($origin && str_ends_with(parse_url($origin, PHP_URL_HOST) ?? '', 'sheetthis.com')) {
            return true;
        }

        if ($referer && str_ends_with(parse_url($referer, PHP_URL_HOST) ?? '', 'sheetthis.com')) {
            return true;
        }

        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'full_name' => ['required', 'string', 'max:100'],
            'email' => ['required', Rule::email()
                ->when(app()->isProduction(), fn ($rule) => $rule->rfcCompliant()),
                Rule::unique('users', 'email')],
            'terms_agreed' => ['required', 'boolean'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ];
    }
}
