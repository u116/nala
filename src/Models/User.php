<?php

namespace Src\Models;

class User extends Model
{
    public function getUsername(int $uid, ?string $username = null)
    {
        return $this->DB
            ->select('username')
            ->from('users')
            ->where("uid={$uid}")
            ->fetchColumn();
    }

    public function getPassword(?int $uid, ?string $username = null)
    {
        return $this->DB
            ->select('password')
            ->from('users')
            ->where("uid={$uid}")
            ->fetchColumn();
    }

    public function getUserId(string $username): int
    {
        return (int) $this->DB
            ->select('uid')
            ->from('users')
            ->where("username='{$username}'")
            ->fetchColumn();
    }

    public function findUsername(string $username): bool
    {
        return (bool)$this->DB
            ->select('uid')
            ->from('users')
            ->where("username='{$username}'")
            ->fetchColumn();
    }
}