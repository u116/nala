<?php

namespace Src\Models;

class User extends Model
{
    public function getUserInfo(int $uid): array
    {
        return $this->DB
            ->select([
                'uid',
                'username',
            ])
            ->from('users')
            ->where("uid={$uid}")
            ->fetchAssoc();
    }

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

    public function register(string $username, string $password, ?string $email): int
    {
        return $this->DB
            ->insert([
                'username' => $username,
                'password' => $password,
                'email' => $email
            ])
            ->into('users')
            ->executeAndGetId()::insertedId();
    }
}