<?php

namespace Src\Controllers;

class BlogController extends AbstractController
{

    private function prepareBlog(): ?array
    {
        foreach ((array)$blog = $this->Blog->getBlog() as $key => $value) {
            $blog[$key]['date'] = substr($value['date'], 0, 10);
        }
        return empty($blog) ? null : $blog;
    }

    public function get(): array
    {
        return $this->render('blog', [
                'blog' => $this->prepareBlog(),
            ],
            true
        );
    }
}