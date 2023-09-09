<?php

namespace Src\Http\Forms;

use Src\Models\User;

class LoginForm extends Form
{
    private array $fields = [
        'u' => 'username',
        'p' => 'password',
        's' => 'submit'
    ];

    public function isCorrect(): int|LoginForm
    {
       if (!$this->validatePostForm(array_keys($this->fields)))
            return 401;
       return $this;
    }

    public function getTrimmedValues(): array
    {
        return $this->getPostData();
    }
}