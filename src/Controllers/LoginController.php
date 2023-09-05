<?php

namespace Src\Controllers;

class LoginController extends AbstractController
{
    public function get(): array
    {
        return $this->render('login');
    }
}