<?php

namespace Src\Controllers;

class ResponseController extends AbstractController
{
    public function httpCodeResponse($httpCode): void
    {
        $this->render($httpCode);
    }
}