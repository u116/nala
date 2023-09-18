<?php

namespace Src\Models;

class UserSession extends User
{
    public string $token;

    public function makeSession(int $uid): bool
    {
        return (bool)$this->DB
            ->insert([
                'token' => $this->token = self::generateToken(),
                'uid' => $uid
            ])
            ->into('sessions')
            ->execute();
    }

    public function destroySession(string $token): bool
    {
        return (bool)$this->DB
            ->delete()
            ->from('sessions')
            ->where([
                "token='{$token}'"
            ])
            ->execute();
    }

    public function getToken(int $uid): string
    {
        return $this->DB
            ->select('token')
            ->from('sessions')
            ->where("uid={$uid}")
            ->fetchColumn();
    }

    public function getUidFromToken(string $token): int
    {
        return (int)$this->DB
            ->select('uid')
            ->from('sessions')
            ->where("token='{$token}'")
            ->fetchColumn();
    }

    public static function generateToken(): string
    {
        return hash('sha256', random_bytes(12));
    }
}