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
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property-read int $id
 * @property-read string $name
 * @property-read IndustryEnum $industry
 * @property-read string|null $logo
 * @property-read int $owner_id
 * @property-read User $owner
 * @property-read Department[] $departments
 * @property-read CompanyPolicy $policy
 * @property-read JobRole[] $jobRoles
 * @property-read Employee[] $employees
 * @property-read Project[] $projects
 * @property-read Request[] $requests
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
        return $this->hasMany(
            related: Department::class,
            foreignKey: 'company_id',
            localKey: 'id',
        );
    }

    public function jobRoles(): HasMany
    {
        return $this->hasMany(
            related: JobRole::class,
            foreignKey: 'company_id',
            localKey: 'id',
        );
    }

    public function policy(): HasOne
    {
        return $this->hasOne(
            related: CompanyPolicy::class,
            foreignKey: 'company_id',
            localKey: 'id',
        );
    }

    public function employees(): HasMany
    {
        return $this->hasMany(
            related: Employee::class,
            foreignKey: 'company_id',
            localKey: 'id',
        );
    }

    public function projects(): HasMany
    {
        return $this->hasMany(
            related: Project::class,
            foreignKey: 'company_id',
            localKey: 'id',
        );
    }

    public function requests(): HasManyThrough
    {
        return $this->hasManyThrough(
            related: Request::class,
            through: Employee::class,
            firstKey: 'company_id',
            secondKey: 'employee_id',
            localKey: 'id',
            secondLocalKey: 'id',
        );
    }
}
