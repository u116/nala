<?php

namespace Src\Models;

class Validator
{
    public static function about(?string $value): ?bool
    {
        if (!empty($value)) return true;
        return false;
    }
}