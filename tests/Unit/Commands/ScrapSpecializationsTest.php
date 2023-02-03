<?php

declare(strict_types=1);

namespace Tests\Unit\Commands;

use App\Jobs\SpecializationJob;
use Tests\TestCase;

class ScrapSpecializationsTest extends TestCase
{
    public function testSpecializationsJobDispatchSuccess(): void
    {
        $this->expectsJobs(SpecializationJob::class);
        $this->artisan("timetable:specializations");
    }
}
