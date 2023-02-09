<?php

declare(strict_types=1);

namespace App\Exceptions\Api;

abstract class ExceptionAbstract
{
    protected $exception;
    protected int $statusCode;
    protected string $message;

    public function __construct($exception)
    {
        $this->exception = $exception;
    }

    public function message(): string
    {
        return $this->message;
    }

    public function statusCode(): int
    {
        return $this->statusCode;
    }

    abstract public function handleStatusCode(): void;

    abstract public function handleMessage(): void;
}
