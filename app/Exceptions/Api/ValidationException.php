<?php

declare(strict_types=1);

namespace App\Exceptions\Api;

use Symfony\Component\HttpFoundation\Response;

class ValidationException extends ExceptionAbstract
{
    public function handleStatusCode(): void
    {
        $this->statusCode = Response::HTTP_UNPROCESSABLE_ENTITY;
    }

    public function handleMessage(): void
    {
        /** @var \Illuminate\Validation\ValidationException $errors */
        $errors = $this->exception;
        $this->message = json_encode($errors->errors());
    }
}
