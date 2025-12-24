<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\IndustryEnum;
use Database\Factories\CompanyFactory;
use Illuminate\Database\Eloquent\Attributes\UseFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property-read int $id
 * @property-read string $name
 * @property-read IndustryEnum $industry
 * @property-read string|null $logo
 * @property-read int $owner_id
 * @property-read User $owner
 * @property-read Department[] $departments
 */
#[UseFactory(CompanyFactory::class)]
final class Company extends Model
{
    use HasFactory;

    protected $table = 'companies';

    protected $fillable = [
        'name',
        'industry',
        'logo',
        'owner_id',
    ];

    protected $casts = [
        'industry' => IndustryEnum::class,
    ];

    public function owner(): BelongsTo
    {
        return $this->belongsTo(
            related: User::class,
            foreignKey: 'owner_id',
            ownerKey: 'id',
        );
    }

    public function departments(): HasMany
    {
        return $this->hasMany(Department::class);
    }
}
