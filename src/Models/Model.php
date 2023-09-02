<?php

namespace Src\Models;

use Src\Models\Database;

abstract class Model
{
    protected Database $DB;

    public function __construct()
    {
        $this->DB = new Database;
    }
}