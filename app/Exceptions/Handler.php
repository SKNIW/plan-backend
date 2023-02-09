<?php

declare(strict_types=1);

namespace App\Exceptions;

use App\Exceptions\Api\ApiErrorHandlerService;
use Illuminate\Contracts\Container\Container;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response as HttpResponse;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class Handler extends ExceptionHandler
{
    protected $dontReport = [
    ];
    protected $dontFlash = [
        "current_password",
        "password",
        "password_confirmation",
    ];

    public function __construct(
        Container $container,
        private readonly ApiErrorHandlerService $apiErrorHandlerService,
    ) {
        parent::__construct($container);
    }

    public function register(): void
    {
        $this->reportable(function (Throwable $e): void {
        });
    }

    public function render($request, Throwable $e): HttpResponse|JsonResponse|Response
    {
        return $this->apiErrorHandlerService->handleError($this->prepareException($e));
    }
}
