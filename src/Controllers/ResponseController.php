<?php

namespace Src\Controllers;

class ResponseController extends AbstractController
{
    public function httpCodeResponse($httpCode): array
    {
        http_response_code($httpCode);
        return $this->render($httpCode);
    }
}