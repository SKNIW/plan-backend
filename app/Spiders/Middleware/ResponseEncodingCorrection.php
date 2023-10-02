<?php

declare(strict_types=1);

namespace App\Spiders\Middleware;

use App\Spiders\Utils\Constants;
use RoachPHP\Downloader\Middleware\ResponseMiddlewareInterface;
use RoachPHP\Http\Response;
use RoachPHP\Support\Configurable;

class ResponseEncodingCorrection implements ResponseMiddlewareInterface
{
    use Configurable;

    public function handleResponse(Response $response): Response
    {
        $body = iconv(Constants::CHARSET_ISO_8859_2, Constants::CHARSET_UTF_8, $response->getBody());

        return $response->withBody($body);
    }
}
