<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\WorkWeekDaysEnum;
use Database\Factories\CompanyPolicyFactory;
use Illuminate\Database\Eloquent\Attributes\UseFactory;
use Illuminate\Database\Eloquent\Casts\AsEnumCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property-read int $id
 * @property-read int $company_id
 * @property-read string $default_time_zone
 * @property-read int $standard_work_day
 * @property-read WorkWeekDaysEnum[] $work_week
 * @property-read bool $overtime_enabled
 * @property-read Company $company
 */
#[UseFactory(CompanyPolicyFactory::class)]
final class CompanyPolicy extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'default_time_zone',
        'standard_work_day',
        'work_week',
        'overtime_enabled',
    ];

    protected $casts = [
        'work_week' => AsEnumCollection::class.':'.WorkWeekDaysEnum::class,
        'overtime_enabled' => 'boolean',
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(
            related: Company::class,
            foreignKey: 'company_id',
            ownerKey: 'id'
        );
    }
}
