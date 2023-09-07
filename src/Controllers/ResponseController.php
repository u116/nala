<?php

namespace Src\Controllers;

class ResponseController extends AbstractController
{
    private array $messages = [
        404 => [
            'error' => 404,
            'reason' => 'Not Found',
            'message' => "Sorry, the page you are trying to access doesn't seem to exist."
        ],
        400 => [
            'error' => 400,
            'reason' => 'Bad Request',
            'message' => "Sorry, there has been an error processing your request."
        ]
    ];
    public function httpCodeResponse($httpCode): array
    {
        http_response_code($httpCode);
        return $this->render('error', $this->messages[$httpCode]);
    }
}