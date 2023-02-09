<?php

declare(strict_types=1);

namespace App\Http\Resources;

use App\Models\Timetable;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property Timetable $resource
 */
class LecturerTimetableResource extends JsonResource
{
    public function toArray($request): array
    {
        $timetable = $this->resource;

        return [
            "timetable" => SpecializationTimetableRowResource::collection($timetable),
        ];
    }
}
