<?php

namespace Src\Controllers;

class RegisterController extends AbstractController
{
    private array $data;
    private const U_MIN_CHAR = 3;
    private const U_MAX_CHAR = 16;
    private const P_MIN_CHAR = 3;
    private const P_MAX_CHAR = 200;

    public function get(): array
    {
        return $this->render('register');
    }

    public function post()
    {
        if (!strlenBetween($username, self::U_MIN_CHAR, self::U_MAX_CHAR)) {
            $this->errors['username'] = [
                'username' => $this->data['u'],
                'message' => "Username length must be between 3 and 16 chars."
            ];
            return $this;
        }
    }
}