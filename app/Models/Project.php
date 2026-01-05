<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\ProjectStatusEnum;
use Carbon\Carbon;
use Database\Factories\ProjectFactory;
use Illuminate\Database\Eloquent\Attributes\UseFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property-read int $id
 * @property-read string $name
 * @property-read string $client_name
 * @property-read string $description
 * @property-read ProjectStatusEnum $status
 * @property-read Carbon $due_date
 * @property-read int $company_id
 * @property-read Company $company
 * @property-read Carbon $created_at
 * @property-read Carbon $updated_at
 */
#[UseFactory(ProjectFactory::class)]
final class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'name',
        'client_name',
        'description',
        'status',
        'due_date',
    ];

    protected $casts = [
        'status' => ProjectStatusEnum::class,
        'due_date' => 'date:Y-m-d',
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(
            related: Company::class,
            foreignKey: 'company_id',
            ownerKey: 'id',
        );
    }

    public function timesheets(): HasMany
    {
        return $this->hasMany(
            related: Timesheet::class,
            foreignKey: 'project_id',
            localKey: 'id',
        );
    }
}
