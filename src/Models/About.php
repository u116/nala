<?php

namespace Src\Models;

class About extends Model
{
    public function getContent(): string
    {
        return $this->DB
            ->select('content')
            ->from('about')
            ->where('uid=1')
            ->fetchColumn();
    }

    public function edit($value, $uid): bool
    {
        return $this->DB
            ->update('about')
            ->set(['content' => $value])
            ->where("uid={$uid}")
            ->execute();
    }
}