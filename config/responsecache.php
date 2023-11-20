<?php

declare(strict_types=1);

return [
    "enabled" => env("RESPONSE_CACHE_ENABLED", true),

    "cache_profile" => Spatie\ResponseCache\CacheProfiles\CacheAllSuccessfulGetRequests::class,

    "cache_bypass_header" => [
        "name" => env("CACHE_BYPASS_HEADER_NAME", null),
        "value" => env("CACHE_BYPASS_HEADER_VALUE", null),
    ],

    "cache_lifetime_in_seconds" => env("RESPONSE_CACHE_LIFETIME", 60 * 60),

    "add_cache_time_header" => env("APP_DEBUG", true),

    "cache_time_header_name" => env("RESPONSE_CACHE_HEADER_NAME", "response-cache"),

    "add_cache_age_header" => env("RESPONSE_CACHE_AGE_HEADER", false),

    "cache_age_header_name" => env("RESPONSE_CACHE_AGE_HEADER_NAME", "response-cache-age"),

    "cache_store" => env("RESPONSE_CACHE_DRIVER", "redis"),

    "replacers" => [
        \Spatie\ResponseCache\Replacers\CsrfTokenReplacer::class,
    ],

    "cache_tag" => "",

    "hasher" => \Spatie\ResponseCache\Hasher\DefaultHasher::class,

    "serializer" => \Spatie\ResponseCache\Serializers\DefaultSerializer::class,
];
