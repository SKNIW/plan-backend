<?php

declare(strict_types=1);

namespace Tests\Unit\Exceptions\Api;

use App\Exceptions\Api\ErrorHandlerService;
use App\Exceptions\Handler;
use ErrorException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Mockery;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Tests\TestCase;
use Throwable;

class ErrorHandlerServiceTest extends TestCase
{
    /**
     * @throws Throwable
     */
    public function testRenderServerInternalErrorExceptionsForTheApi(): void
    {
        $errorHandlerServiceMock = Mockery::mock(ErrorHandlerService::class)->makePartial();

        $handler = new Handler(
            $this->app,
            $errorHandlerServiceMock,
        );
        $request = new Request();
        $exception = new ErrorException("Internal server error");

        $response = $handler->render($request, $exception);

        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertEquals(500, $response->getStatusCode());
        $this->assertEquals('{"error":"Server Internal Error"}', $response->getContent());
    }

    public function testRenderNotFoundHttpExceptionForTheApi(): void
    {
        $errorHandlerServiceMock = Mockery::mock(ErrorHandlerService::class)->makePartial();

        $handler = new Handler(
            $this->app,
            $errorHandlerServiceMock,
        );
        $request = new Request();
        $exception = new NotFoundHttpException();

        $response = $handler->render($request, $exception);

        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertEquals(404, $response->getStatusCode());
        $this->assertEquals('{"error":"Not Found"}', $response->getContent());
    }
}
