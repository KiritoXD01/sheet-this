<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\IndustryEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property-read int $id
 * @property-read string $name
 * @property-read IndustryEnum $industry
 * @property-read string|null $logo
 * @property-read int $owner_id
 * @property-read User $owner
 */
final class Company extends Model
{
    protected $table = 'companies';

    protected $fillable = [
        'name',
        'industry',
        'logo',
        'owner_id',
    ];

    protected $casts = [
        'industry' => IndustryEnum::class,
    ];

    public function owner(): BelongsTo
    {
        return $this->belongsTo(
            related: User::class,
            foreignKey: 'owner_id',
            ownerKey: 'id',
        );
    }
}
