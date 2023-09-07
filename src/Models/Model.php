<?php

namespace Src\Models;

abstract class Model
{
    protected Database $DB;

    public function __construct()
    {
        $this->DB = new Database;
    }
}