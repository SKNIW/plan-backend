<?php

declare(strict_types=1);

namespace App\Exceptions\Api;

use Symfony\Component\HttpFoundation\Response;

class DefaultException extends ExceptionAbstract
{
    public function handleStatusCode(): void
    {
        $this->statusCode = method_exists($this->exception, "getStatusCode") ? $this->exception->getStatusCode() : Response::HTTP_INTERNAL_SERVER_ERROR;
    }

    public function handleMessage(): void
    {
        $this->message = $this->exception->getMessage();
    }
}
