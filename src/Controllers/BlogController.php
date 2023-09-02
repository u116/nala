<?php

namespace Src\Controllers;

class BlogController extends AbstractController
{
    public string $content;

    private function getContent(): string
    {
        return $this->content = 'hey there, i\'m 21, currently living in Spain. nabuna.me is a personal website that I use for tools like file-sharing, link-shortening and other functionalities.';
    }

    public function get(): array
    {
        return $this->render('blog', [
                'content' => $this->getContent(),
            ]
        );
    }
}