<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Resources\LecturersResource;
use App\Http\Resources\LecturerTimetableResource;
use App\Services\Api\LecturesService;
use Illuminate\Http\Response;

class LecturesController extends Controller
{
    public function __construct(
        public LecturesService $service,
    ) {}

    /**
     * Get all lectures
     *
     * @phpstan-ignore-next-line
     * @return array{data: array<LecturersResource>}
     */
    public function index(): Response
    {
        return new Response(new LecturersResource($this->service->getAllLecturers()));
    }

    /**
     * Get plan by lecturer name
     *
     * @param string $name Lecturer name.
     * @phpstan-ignore-next-line
     * @return array{data: array<LecturerTimetableResource>}
     */
    public function getPlanForLecturerByName(string $name): LecturerTimetableResource
    {
        return $this->service->getPlanByLecturerByName($name);
    }
}
