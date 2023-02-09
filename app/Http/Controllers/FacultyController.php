<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Resources\FacultyFieldsResource;
use App\Http\Resources\FacultyResource;
use App\Http\Resources\FacultySimpleResource;
use App\Services\Api\FacultyService;
use Illuminate\Http\Resources\Json\ResourceCollection;

class FacultyController extends Controller
{
    public function __construct(
        public FacultyService $service,
    ) {}

    /**
     * Get all faculties.
     *
     * @phpstan-ignore-next-line
     * @return array{data: array<FacultySimpleResource>},
     */
    public function index(): ResourceCollection
    {
        return $this->service->getAllFaculties();
    }

    /**
     * Get all specialties by faculty id
     *
     * @param int $id Faculty id.
     *
     * @phpstan-ignore-next-line
     * @return array{data: array<FacultyFieldsResource>}
     */
    public function fieldsIndex(int $id): FacultyFieldsResource
    {
        return $this->service->getFieldsByFaculty($id);
    }

    /**
     * Get all specialties together yes by faculty id
     *
     * @param int $id Faculty id.
     *
     * @phpstan-ignore-next-line
     * @return array{data: array<FacultyResource>}
     */
    public function show(int $id): FacultyResource
    {
        return $this->service->getFacultyById($id);
    }
}
