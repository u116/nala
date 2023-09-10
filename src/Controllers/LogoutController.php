<?php

namespace Src\Controllers;

use Src\Http\Middleware\Cookie;

class LogoutController
{
    public function __construct()
    {
        (new Cookie)->killCookies();
    }

    public function get(): array
    {
        header('Location: /');
        return (new HomeController)->get();
    }
}