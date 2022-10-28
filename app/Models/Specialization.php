<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property-read Field $field
 */
class Specialization extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "slug",
    ];

    /**
     * @return BelongsTo<Field>
     */
    public function field(): BelongsTo
    {
        return $this->belongsTo(Field::class);
    }
}
