<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\RequestStatusEnum;
use App\Enums\RequestTypeEnum;
use Carbon\Carbon;
use Database\Factories\RequestFactory;
use Illuminate\Database\Eloquent\Attributes\UseFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property-read int $id,
 * @property-read int $employee_id
 * @property-read RequestTypeEnum $request_type
 * @property-read Carbon $start_date
 * @property-read Carbon $end_date
 * @property-read RequestStatusEnum $status
 * @property-read string|null $notes
 * @property-read Carbon $created_at
 * @property-read Carbon $updated_at
 * @property-read Employee $employee
 * @property-read int $days
 */
#[UseFactory(RequestFactory::class)]
final class Request extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'request_type',
        'start_date',
        'end_date',
        'status',
        'notes',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'request_type' => RequestTypeEnum::class,
        'status' => RequestStatusEnum::class,
    ];

    public function employee(): BelongsTo
    {
        return $this->belongsTo(
            related: Employee::class,
            foreignKey: 'employee_id',
            ownerKey: 'id'
        );
    }

    public function days(): Attribute
    {
        return Attribute::get(get: fn (): int => (int) $this->start_date->diffInDays($this->end_date) + 1);
    }
}
