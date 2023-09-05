<?php

namespace Src\Controllers;

use Src\Models\User;

class UserController extends AbstractController
{
    public function get(): array
    {
        return $this->render('');
    }
}