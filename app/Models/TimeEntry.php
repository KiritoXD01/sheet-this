<?php

declare(strict_types=1);

namespace App\Models;

use Database\Factories\TimeEntryFactory;
use Illuminate\Database\Eloquent\Attributes\UseFactory;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * @property string $id
 * @property string $user_id
 * @property string $project_id
 * @property string|null $task_id
 * @property string|null $description
 * @property Carbon $started_at
 * @property Carbon|null $ended_at
 * @property int|null $duration_seconds
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property-read User $user
 * @property-read Project $project
 * @property-read Task|null $task
 */
#[UseFactory(TimeEntryFactory::class)]
final class TimeEntry extends Model
{
    use HasFactory, HasUlids;

    protected $keyType = 'string';

    protected $fillable = [
        'user_id',
        'project_id',
        'task_id',
        'description',
        'started_at',
        'ended_at',
        'duration_seconds',
    ];

    protected $casts = [
        'started_at' => 'datetime',
        'ended_at' => 'datetime',
        'duration_seconds' => 'integer',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(
            related: User::class,
            foreignKey: 'user_id',
            ownerKey: 'id',
        );
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(
            related: Project::class,
            foreignKey: 'project_id',
            ownerKey: 'id',
        );
    }

    public function task(): BelongsTo
    {
        return $this->belongsTo(
            related: Task::class,
            foreignKey: 'task_id',
            ownerKey: 'id',
        );
    }
}
