<?php

namespace Src\Models;

class Redirect extends Model
{
    public function getURL(string $name, int $uid): string
    {
        return $this->DB
            ->select('url')
            ->from('redirect')
            ->where("name='$name' and uid={$uid}")
            ->fetchColumn();
    }

    public function getUserRedirects(int $uid): ?array
    {
        return $this->DB
            ->select('name,url,uid')
            ->from('redirect')
            ->where("uid={$uid}")
            ->fetchAll();
    }

    public function create(string $name, string $url, int $uid): bool
    {
        return (bool)$this->DB
            ->insert([
                'name' => $name,
                'url' => $url,
                'uid' => $uid
            ])
            ->into('redirect')
            ->execute();
    }

    public function exists(string $name, int $uid): bool
    {
        return (bool)$this->DB
            ->select('name')
            ->from('redirect')
            ->where("name='$name' and uid={$uid}")
            ->fetchColumn();
    }
}