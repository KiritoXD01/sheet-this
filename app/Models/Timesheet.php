<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\TimesheetStatusEnum;
use Carbon\Carbon;
use Database\Factories\TimesheetFactory;
use Illuminate\Database\Eloquent\Attributes\UseFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property-read int $id
 * @property-read int $employee_id
 * @property-read TimesheetStatusEnum $status
 * @property-read string|null $notes
 * @property-read Carbon $created_at
 * @property-read Carbon $updated_at
 * @property-read Employee $employee
 * @property-read TimesheetItem[] $items
 */
#[UseFactory(TimesheetFactory::class)]
final class Timesheet extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'status',
        'notes',
    ];

    protected $casts = [
        'status' => TimesheetStatusEnum::class,
    ];

    public function employee(): BelongsTo
    {
        return $this->belongsTo(
            related: Employee::class,
            foreignKey: 'employee_id',
            ownerKey: 'id'
        );
    }

    public function items(): HasMany
    {
        return $this->hasMany(
            related: TimesheetItem::class,
            foreignKey: 'timesheet_id',
            localKey: 'id',
        );
    }
}
