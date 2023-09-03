<?php

namespace Src\Controllers;

class IndexController extends AbstractController
{
    public function get(): array
    {
        $index = $this->Index->getIndex();
        return $this->render('index', [
                'index' => empty($index) ? null : $index,
            ]
        );
    }
}