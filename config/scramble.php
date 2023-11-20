<?php

declare(strict_types=1);

return [
    "api_path" => "api",

    "api_domain" => env("APP_URL", "http://localhost"),

    "info" => [
        "version" => env("API_VERSION", "1.0.0"),

        "description" => "Backend api documentation",
    ],

    "servers" => [
        "Local" => "api",
        "Prod" => env("APP_URL", "http://localhost"),
    ],

    "middleware" => [
        "web",
    ],

    "extensions" => [],
];
