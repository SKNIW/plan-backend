<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Resources\FieldResource;
use App\Http\Resources\FieldSpecializationsResource;
use App\Services\Api\FieldService;
use Illuminate\Http\Resources\Json\ResourceCollection;

class FieldController extends Controller
{
    public function __construct(
        public FieldService $service,
    ) {}

    /**
     * Get all fields.
     *
     * @phpstan-ignore-next-line
     * @return array{data: array<FieldResource>}
     */
    public function index(): ResourceCollection
    {
        return $this->service->getAllFields();
    }

    /**
     * Get all specialties by field id
     *
     * @param int $id Field id.
     *
     * @phpstan-ignore-next-line
     * @return array{data: array<FieldSpecializationsResource>}
     */
    public function specializationsIndex(int $id): FieldSpecializationsResource
    {
        return $this->service->getSpecializationsByFieldId($id);
    }

    /**
     * Show filed by id
     *
     * @param int $id Field id.
     *
     * @phpstan-ignore-next-line
     * @return array{data: array<FieldResource>}
     */
    public function show(int $id): FieldResource
    {
        return $this->service->getFieldById($id);
    }
}
