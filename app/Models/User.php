<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\UserRoleEnum;
use App\Notifications\VerifyEmail;
use Carbon\Carbon;
use Database\Factories\UserFactory;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Attributes\UseFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

/**
 * @property-read int $id
 * @property-read string $name
 * @property-read string $email
 * @property-read string $password
 * @property-read UserRoleEnum $role
 * @property-read Carbon|null $email_verified_at
 * @property-read Carbon|null $terms_agreed_at * @property-read string|null $remember_token
 * @property-read Carbon $created_at
 * @property-read Carbon $updated_at
 * @property-read Company|null $company
 * @property-read Employee|null $employee
 * @property-read string $initials
 */
#[UseFactory(UserFactory::class)]
final class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'terms_agreed_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function company(): HasOne
    {
        return $this->hasOne(
            related: Company::class,
            foreignKey: 'owner_id',
            localKey: 'id',
        );
    }

    public function employee(): HasOne
    {
        return $this->hasOne(
            related: Employee::class,
            foreignKey: 'user_id',
            localKey: 'id',
        );
    }

    public function sendEmailVerificationNotification(): void
    {
        $this->notify(new VerifyEmail($this->verificationUrl()));
    }

    protected function initials(): Attribute
    {
        return Attribute::make(
            get: function (): string {
                if (empty($this->name)) {
                    return '';
                }

                $words = array_values(array_filter(Str::of($this->name)->trim()->explode(' ')->all()));

                if (count($words) >= 2) {
                    return Str::upper(Str::substr($words[0], 0, 1).Str::substr($words[1], 0, 1));
                }

                if (count($words) === 1) {
                    return Str::upper(Str::substr($words[0], 0, 2));
                }

                return '';
            }
        );
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'role' => UserRoleEnum::class,
            'terms_agreed_at' => 'datetime',
        ];
    }

    protected function verificationUrl(): string
    {
        return URL::temporarySignedRoute(
            'verification.verify',
            now()->addMinutes(60),
            [
                'user' => $this->getKey(),
                'hash' => sha1($this->getEmailForVerification()),
            ]
        );
    }
}
