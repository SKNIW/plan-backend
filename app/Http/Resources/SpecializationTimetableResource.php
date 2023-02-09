<?php

declare(strict_types=1);

namespace App\Http\Resources;

use App\Models\Specialization;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property Specialization $resource
 */
class SpecializationTimetableResource extends JsonResource
{
    public function toArray($request): array
    {
        $specialization = $this->resource;

        return [
            "id" => $specialization->id,
            "timetable" => SpecializationTimetableRowResource::collection($specialization->getFilteredTimetable()),
        ];
    }
}
