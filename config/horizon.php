<?php

declare(strict_types=1);

use Illuminate\Support\Str;

return [
    "domain" => env("HORIZON_DOMAIN"),

    "path" => env("HORIZON_PATH", "horizon"),

    "use" => "default",

    "prefix" => env(
        "HORIZON_PREFIX",
        Str::slug(env("APP_NAME", "laravel"), "_") . "_horizon:",
    ),

    "middleware" => ["web"],

    "waits" => [
        "redis:scrap-masters" => 60,
    ],

    "trim" => [
        "recent" => 60,
        "pending" => 60,
        "completed" => 60,
        "recent_failed" => 10080,
        "failed" => 10080,
        "monitored" => 10080,
    ],

    "metrics" => [
        "trim_snapshots" => [
            "job" => 24,
            "queue" => 24,
        ],
    ],

    "fast_termination" => false,

    "memory_limit" => 64,

    "defaults" => [
        "supervisor-1" => [
            "connection" => "redis",
            "queue" => ["scrap-masters"],
            "balance" => "auto",
            "maxProcesses" => 1,
            "maxTime" => 0,
            "maxJobs" => 0,
            "memory" => 128,
            "tries" => 1,
            "timeout" => 270,
            "nice" => 0,
        ],
    ],

    "environments" => [
        "production" => [
            "supervisor-1" => [
                "maxProcesses" => 5,
                "balanceMaxShift" => 1,
                "balanceCooldown" => 3,
            ],
        ],

        "local" => [
            "supervisor-1" => [
                "maxProcesses" => 5,
                "balanceMaxShift" => 1,
                "balanceCooldown" => 3,
            ],
        ],
    ],
];
