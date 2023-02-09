<?php

declare(strict_types=1);

namespace App\Http\Resources;

use App\Models\Faculty;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property Faculty $resource
 */
class FacultyFieldsResource extends JsonResource
{
    public function toArray($request): array
    {
        $faculty = $this->resource;

        return [
            "id" => $faculty->id,
            "fields" => FacultyFieldResource::collection($faculty->fields),
        ];
    }
}
