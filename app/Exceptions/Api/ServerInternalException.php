<?php

declare(strict_types=1);

namespace App\Exceptions\Api;

use Symfony\Component\HttpFoundation\Response;

class ServerInternalException extends ExceptionAbstract
{
    public function handleStatusCode(): void
    {
        $this->statusCode = Response::HTTP_INTERNAL_SERVER_ERROR;
    }

    public function handleMessage(): void
    {
        $this->message = "Server Internal Error";
    }
}
