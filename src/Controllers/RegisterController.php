<?php

namespace Src\Controllers;

class RegisterController extends AbstractController
{
    public function get(): array
    {
        return $this->render('register');
    }
}