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
        ],
        401 => [
            'error' => 401,
            'reason' => 'Unauthorized',
            'message' => "Sorry, you are not allowed to access this resource."
        ]
    ];

    public function httpCodeResponse($httpCode): array
    {
        if (!in_array($httpCode, array_keys($this->messages)))
            $httpCode = 404;

        http_response_code($httpCode);
        return $this->render('error', [
            $this->messages[$httpCode],
            'referer' => $_SERVER['HTTP_REFERER'] ?? '/'
            ]);
    }
}