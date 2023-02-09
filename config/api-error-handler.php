<?php

declare(strict_types=1);

return [
    Symfony\Component\HttpKernel\Exception\NotFoundHttpException::class => App\Exceptions\Api\NotFoundException::class,
    ErrorException::class => App\Exceptions\Api\ServerInternalException::class,
    Illuminate\Database\QueryException::class => App\Exceptions\Api\ServerInternalException::class,
    Illuminate\Validation\ValidationException::class => App\Exceptions\Api\ValidationException::class,
    Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException::class => App\Exceptions\Api\NotFoundException::class,
];
