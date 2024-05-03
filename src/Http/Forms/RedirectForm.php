<?php

namespace Src\Http\Forms;

class RedirectForm extends Form
{
    private array $fields = [
        'n' => 'name',
        'u' => 'url',
        's' => 'submit'
    ];
    public int $errorCode = 401;

    public function isCorrect(): bool
    {
        return $this->validatePostForm(array_keys($this->fields));
    }
}