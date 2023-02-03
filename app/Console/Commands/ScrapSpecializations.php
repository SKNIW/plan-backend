<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Jobs\SpecializationJob;
use Illuminate\Console\Command;
use Symfony\Component\Console\Command\Command as CommandAlias;

class ScrapSpecializations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = "timetable:specializations";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Start scraping all specializations for the plan";

    public function handle(): int
    {
        SpecializationJob::dispatch()->onQueue(SpecializationJob::getDefaultQueueName());
        return CommandAlias::SUCCESS;
    }
}
