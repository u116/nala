<?php

namespace Src\Controllers;

class AbstractController
{
    private static string $viewsPath = BASE_PATH . 'views/';
    private static array $views = [
        'home' => 'home/home',
        'about' => 'about/about',
        'contact' => 'contact/contact',
        'interests' => 'contact/interests',
        'blog' => 'contact/blog',
        'index' => 'contact/index',
        '404' => 'response/404'
    ];

    public function render($route, $variables = []): array
    {
        return [
            'base' => view('base.view.php'),
            'page' => [
                'route' => path('views/' . self::$views[$route] . '.view.php'),
                'var' => $variables
            ]
        ];
    }
}