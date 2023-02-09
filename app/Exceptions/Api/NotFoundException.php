<?php

declare(strict_types=1);

namespace App\Exceptions\Api;

use Symfony\Component\HttpFoundation\Response;

class NotFoundException extends ExceptionAbstract
{
    public function handleStatusCode(): void
    {
        $this->statusCode = Response::HTTP_NOT_FOUND;
    }

    public function handleMessage(): void
    {
        $this->message = "Not Found";
    }
}
