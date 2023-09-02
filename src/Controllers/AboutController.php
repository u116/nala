<?php

namespace Src\Controllers;

use Src\Models\About;

class AboutController extends AbstractController
{
    public string $content;

    private function getContent()
    {
        return $this->content = $this->About->getContent();
    }

    public function get(): array
    {
        return $this->render('about', [
                'content' => $this->getContent(),
            ]
        );
    }
}