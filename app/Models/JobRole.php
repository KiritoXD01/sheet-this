<?php

declare(strict_types=1);

namespace App\Models;

use Carbon\Carbon;
use Database\Factories\JobRoleFactory;
use Illuminate\Database\Eloquent\Attributes\UseFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property-read int $id
 * @property-read int $company_id
 * @property-read string $name
 * @property-read Carbon $created_at
 * @property-read Carbon $updated_at
 * @property-read Company $company
 * */
#[UseFactory(JobRoleFactory::class)]
final class JobRole extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'name',
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(
            related: Company::class,
            foreignKey: 'company_id',
            ownerKey: 'id',
        );
    }
}
