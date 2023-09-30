<?php

namespace Src\Models;

class Hasher
{
    public static function make($pwd, $algo = PASSWORD_BCRYPT): string
    {
        return password_hash($pwd, $algo);
    }

    public static function check($value, $userPwd): bool
    {
        return password_verify($value, $userPwd);
    }
}