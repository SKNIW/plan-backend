<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Exceptions\SpecializationNotFoundException;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property-read Field $field
 * @property-read Collection<Timetable> $timetable
 * @property-read Collection<Legend> $legend
 */
class Specialization extends Model
{
    use HasFactory;

    protected $table = "specializations";
    protected $fillable = [
        "name",
        "slug",
    ];

    /**
     * @return BelongsTo<Field, Specialization>
     */
    public function field(): BelongsTo
    {
        return $this->belongsTo(Field::class);
    }

    /**
     * @return HasMany<Timetable>
     */
    public function timetable(): HasMany
    {
        return $this->hasMany(Timetable::class);
    }

    /**
     * @return HasMany<Legend>
     */
    public function legend(): HasMany
    {
        return $this->hasMany(Legend::class);
    }

    /**
     * @throws SpecializationNotFoundException
     */
    public static function findBySpecializationId(int $specializationId): self
    {
        /** @var self|null $specialization */
        $specialization = self::query()->with(["timetable" => function ($query): void {
            $query->whereNotNull("legend_id");
        }])->where("id", $specializationId)
            ->first();

        if ($specialization === null) {
            throw new SpecializationNotFoundException();
        }
        return $specialization;
    }

    /**
     * @throws SpecializationNotFoundException
     */
    public static function findBySpecializationIdWitchField(int $specializationId): self
    {
        /** @var self|null $specialization */
        $specialization = self::query()->with("field")->where("id", $specializationId)
            ->first();

        if ($specialization === null) {
            throw new SpecializationNotFoundException();
        }
        return $specialization;
    }

    /**
     * @throws SpecializationNotFoundException
     */
    public static function findBySpecializationIdWitchLegend(int $specializationId): self
    {
        /** @var self|null $specialization */
        $specialization = self::query()->with("timetable", "timetable.legend")->where("id", $specializationId)
            ->first();

        if ($specialization === null) {
            throw new SpecializationNotFoundException();
        }
        return $specialization;
    }

    /**
     * @throws SpecializationNotFoundException
     */
    public static function getAllSpecializationWitchField(): Collection
    {
        return self::query()->with("field", "field.faculty")->get();
    }
}
