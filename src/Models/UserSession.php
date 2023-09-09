<?php

namespace Src\Models;

class UserSession extends User
{

    public function makeSession(int $uid): null|string
    {
        if ($token = $this->sessionExists($uid)) return $token;

        if ($this->DB
            ->insert([
                'token' => $token = self::generateToken(),
                'uid' => $uid
            ])
            ->into('sessions')
            ->execute()
        ) return $token;

        return null;
    }

    private function sessionExists(int $uid): string
    {
        return $this->DB
            ->select('token')
            ->from('sessions')
            ->where("uid={$uid}")
            ->fetchColumn();
    }

    public static function generateToken(): string
    {
        return hash('sha256', random_bytes(12));
    }
}