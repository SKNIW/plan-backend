<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Support\Collection;
use JsonSerializable;

class LecturersResource implements JsonSerializable
{
    public function __construct(
        public readonly Collection $lecturers,
    ) {}

    public function jsonSerialize(): array
    {
        return [
            "data" => $this->lecturers->values()->jsonSerialize(),
        ];
    }
}
