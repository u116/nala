<?php

namespace Src\Controllers;

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