<?php

namespace Src\Http\Forms;

abstract class Form
{
    private array $data;

    public function validatePostForm(array $fields): bool
    {
        foreach (array_keys($_POST) as $field)
            if (!in_array($field, $fields)) return false;
        return true;
    }

    public function getPostData(): ?array
    {
        foreach ($_POST as $key => $value)
            $this->data[$key] = trim($value);
        return $this->data ?? null;
    }
}