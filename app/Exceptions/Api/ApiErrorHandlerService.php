<?php

declare(strict_types=1);

namespace App\Exceptions\Api;

use Illuminate\Http\JsonResponse;
use Throwable;

class ApiErrorHandlerService
{
    public function handleError(Throwable $exception): JsonResponse
    {
        $exceptions = config("api-error-handler") ?? [];
        $class = array_key_exists(
            get_class($exception),
            $exceptions,
        ) ? $exceptions[get_class($exception)] : (config("app.debug") ? DefaultException::class : ServerInternalException::class);

        $handler = new $class($exception);

        $handler->handleStatusCode();
        $handler->handleMessage();

        return response()->json(
            [
                "error" => $handler->message(),
            ],
            $handler->statusCode(),
        );
    }
}
