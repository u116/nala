<?php

namespace Src\Models;

class About extends Model
{
    public function getContent(int $uid): string
    {
        return $this->DB
            ->select('content')
            ->from('about')
            ->where("uid={$uid}")
            ->fetchColumn();
    }

    public function edit(string $value, int $uid): bool
    {
        return $this->DB
           ->update('about')
           ->set(['content' => $value])
           ->where("uid={$uid}")
           ->execute();
    }
}