<?php

namespace Src\Http\Forms;

class RegisterForm extends Form
{
    private array $fields = [
        'u' => 'username',
        'p' => 'password',
        'e' => 'email',
        's' => 'submit'
    ];
    public int $errorCode = 401;

    public function isCorrect(): int|RegisterForm
    {
        return $this->validatePostForm(array_keys($this->fields));
    }
}