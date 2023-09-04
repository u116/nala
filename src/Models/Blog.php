<?php

namespace Src\Models;

class Blog extends Model
{
    public function getBlog()
    {
        return $this->DB
            ->select('title, content, picture, date')
            ->from('blog')
            ->where('uid=1')
            ->orderBy('date', 'DESC')
            ->fetchAll();
    }
}