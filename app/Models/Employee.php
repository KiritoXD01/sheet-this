<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property-read int $id
 * @property-read int $user_id
 * @property-read int $company_id
 * @property-read string|null $employee_code
 * @property-read int|null $job_role_id
 * @property-read int|null $department_id
 * @property-read string|null $profile_picture
 */
final class Employee extends Model
{
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
}
