<?php

namespace Src\Controllers;

use Src\Http\Middleware\Cookie;
use Src\Models\UserSession;
use Src\Http\Middleware\UserVerify;

class LogoutController
{
    public function __construct()
    {
        if ((new UserSession)->destroySession((new UserVerify)::getTokenFromCookie()))
            (new Cookie)->killCookies();
    }

    public function get(): array
    {
        header('Location: /');
        return (new HomeController)->get();
    }
}