<?php

namespace Src\Http\Forms;

class EditForm extends Form
{
    private string $currentSection;
    private array $fields;
    private array $aboutFields = [
        'a' => 'about',
        's' => 'submit'
    ];

    public int $errorCode = 401;

    public function __construct(string $section)
    {
        $current = $section . "Fields";
        $this->fields = $this->$current;
    }

    public function isCorrect(): bool
    {
        return $this->validatePostForm(array_keys($this->fields));
    }
}