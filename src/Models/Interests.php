<?php

namespace Src\Models;

class Interests extends Model
{
    public function getInterests(): ?array
    {
        return $this->DB
            ->select('title,description,date')
            ->from('interests')
            ->where('uid=1')
            ->fetchAll();
    }
}