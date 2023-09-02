<?php

namespace Src\Controllers;

class HomeController extends AbstractController
{
    public function get(): array
    {
        return $this->render('home');
    }
}