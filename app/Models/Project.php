<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\ProjectStatusEnum;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * @property string $id
 * @property string $user_id
 * @property string $name
 * @property ProjectStatusEnum $status
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property-read User $user
 */
final class Project extends Model
{
    use HasFactory, HasUlids;

    protected $keyType = 'string';

    protected $fillable = [
        'user_id',
        'name',
        'status',
    ];

    protected $casts = [
        'status' => ProjectStatusEnum::class,
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
