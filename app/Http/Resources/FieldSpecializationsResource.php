<?php

declare(strict_types=1);

namespace App\Http\Resources;

use App\Models\Field;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property Field $resource
 */
class FieldSpecializationsResource extends JsonResource
{
    public function toArray($request): array
    {
        $field = $this->resource;

        return [
            "id" => $field->id,
            "specializations" => SpecializationSimpleResource::collection($field->specializations),
        ];
    }
}
