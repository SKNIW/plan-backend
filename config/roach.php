<?php

declare(strict_types=1);

use RoachPHP\Http\Client;
use RoachPHP\Scheduling\ArrayRequestScheduler;

return [
    "request_queue" => ArrayRequestScheduler::class,

    "client" => Client::class,

    "default_spider_namespace" => 'App\Spiders',
];
