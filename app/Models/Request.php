<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\RequestStatusEnum;
use App\Enums\RequestTypeEnum;
use Database\Factories\RequestFactory;
use Illuminate\Database\Eloquent\Attributes\UseFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
}
