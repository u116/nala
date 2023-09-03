<?php

namespace Src\Models;

class Index extends Model
{
    public function getIndex(): array|null
    {
        return $this->DB
            ->select('title,description,link')
            ->from('sakuin')
            ->where('uid=1')
            ->fetchAll();
    }
}