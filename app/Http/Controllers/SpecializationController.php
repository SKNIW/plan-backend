<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Resources\SpecializationLegendResource;
use App\Http\Resources\SpecializationResource;
use App\Http\Resources\SpecializationTimetableResource;
use App\Services\Api\SpecializationService;
use Illuminate\Http\Resources\Json\ResourceCollection;

class SpecializationController extends Controller
{
    public function __construct(
        public SpecializationService $service,
    ) {}

    /**
     * Get all specializations
     * @phpstan-ignore-next-line
     * @return array{data: array<SpecializationResource>}
     */
    public function index(): ResourceCollection
    {
        return $this->service->getAllSpecializations();
    }

    /**
     * Get plan by specialization id
     *
     * @param int $id Specialization id.
     * @phpstan-ignore-next-line
     * @return array{data: array<SpecializationTimetableResource>}
     */
    public function timetableIndex(int $id): SpecializationTimetableResource
    {
        return $this->service->getTimetableBySpecialization($id);
    }

    /**
     * Get legend by specilization id
     *
     * @param int $id Specialization id.
     * @phpstan-ignore-next-line
     * @return array{data: array<SpecializationLegendResource>}
     */
    public function legendIndex(int $id): SpecializationLegendResource
    {
        return $this->service->getLegendBySpecialization($id);
    }

    /**
     * Show specialization by id
     *
     * @param int $id Specialization id.
     * @phpstan-ignore-next-line
     * @return array{data: array<SpecializationResource>}
     */
    public function show(int $id): SpecializationResource
    {
        return $this->service->getSpecializationById($id);
    }
}
