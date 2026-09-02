<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\ProjectStatusEnum;
use Database\Factories\TaskFactory;
use Illuminate\Database\Eloquent\Attributes\UseFactory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * @property string $id
 * @property string $project_id
 * @property string $user_id
 * @property string $name
 * @property ProjectStatusEnum $status
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property-read Project $project
 * @property-read User $user
 * @property-read Collection<int, TimeEntry> $timeEntries
 */
#[UseFactory(TaskFactory::class)]
final class Task extends Model
{
    use HasFactory, HasUlids;

    protected $keyType = 'string';

    protected $fillable = [
        'project_id',
        'user_id',
        'name',
        'status',
    ];

    protected $casts = [
        'status' => ProjectStatusEnum::class,
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(
            related: Project::class,
            foreignKey: 'project_id',
            ownerKey: 'id',
        );
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(
            related: User::class,
            foreignKey: 'user_id',
            ownerKey: 'id',
        );
    }

    public function timeEntries(): HasMany
    {
        return $this->hasMany(
            related: TimeEntry::class,
            foreignKey: 'task_id',
            localKey: 'id',
        );
    }
}
