<?php

declare(strict_types=1);

namespace App\Models;

use Carbon\Carbon;
use Database\Factories\TimesheetItemFactory;
use Illuminate\Database\Eloquent\Attributes\UseFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property-read int $id
 * @property-read int $timesheet_id
 * @property-read int $project_id
 * @property-read Carbon $item_date
 * @property-read string|null $description
 * @property-read string $start_time
 * @property-read string $end_time
 * @property-read bool $is_billable
 * @property-read Carbon $created_at
 * @property-read Carbon $updated_at
 * @property-read Timesheet $timesheet
 * @property-read Project $project
 */
#[UseFactory(TimesheetItemFactory::class)]
final class TimesheetItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'timesheet_id',
        'project_id',
        'item_date',
        'description',
        'start_time',
        'end_time',
        'is_billable',
    ];

    protected $casts = [
        'item_date' => 'date:Y-m-d',
        'start_time' => 'datetime:h:i:s',
        'end_time' => 'datetime:h:i:s',
        'is_billable' => 'boolean',
    ];

    public function timesheet(): BelongsTo
    {
        return $this->belongsTo(
            related: Timesheet::class,
            foreignKey: 'timesheet_id',
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
}
