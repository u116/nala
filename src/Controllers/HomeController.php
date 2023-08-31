<?php

namespace Src\Controllers;

class HomeController extends AbstractController
{
    public string $name;

    private function getName(): string
    {
        return $this->name = 'Nala';
    }

    public function get(): array
    {
        return $this->render('home', [
                'name' => $this->getName()
            ]
        );
    }
}