<?php

namespace Src\Controllers;

use Src\Models\About;

class AboutController extends AbstractController
{
    public function get(): array
    {
        return $this->render('about', [
                'content' => $this->About->getContent(),
            ]
        );
    }
}