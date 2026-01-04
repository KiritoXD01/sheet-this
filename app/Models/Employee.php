<?php

declare(strict_types=1);

namespace App\Models;

use Database\Factories\EmployeeFactory;
use Illuminate\Database\Eloquent\Attributes\UseFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property-read int $id
 * @property-read int $user_id
 * @property-read int $company_id
 * @property-read string|null $employee_code
 * @property-read int|null $job_role_id
 * @property-read int|null $department_id
 * @property-read string|null $profile_picture
 * @property-read User $user
 * @property-read Company $company
 * @property-read Department|null $department
 * @property-read JobRole|null $jobRole
 * @property-read Request[] $requests
 */
#[UseFactory(EmployeeFactory::class)]
final class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'company_id',
        'employee_code',
        'job_role_id',
        'department_id',
        'profile_picture',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(
            related: User::class,
            foreignKey: 'user_id',
            ownerKey: 'id',
        );
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(
            related: Company::class,
            foreignKey: 'company_id',
            ownerKey: 'id',
        );
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(
            related: Department::class,
            foreignKey: 'department_id',
            ownerKey: 'id',
        );
    }

    public function jobRole(): BelongsTo
    {
        return $this->belongsTo(
            related: JobRole::class,
            foreignKey: 'job_role_id',
            ownerKey: 'id',
        );
    }

    public function requests(): HasMany
    {
        return $this->hasMany(
            related: Request::class,
            foreignKey: 'employee_id',
            localKey: 'id'
        );
    }
}
