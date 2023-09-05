<?php

namespace Src\Controllers;

use Src\Models\About;
use Src\Models\Contact;
use Src\Models\Interests;
use Src\Models\Index;
use Src\Models\Blog;

abstract class AbstractController
{
    protected About $About;
    protected Contact $Contact;
    protected Interests $Interests;
    protected Index $Index;
    protected Blog $Blog;
    private static array $views = [
        'about' => 'about/about',
        'contact' => 'contact/contact',
        'interests' => 'interests/interests',
        'blog' => 'blog/blog',
        'index' => 'index/index',
        'login' => 'login/login',
        '404' => 'response/404',
        '400' => 'response/400'
    ];

    public function __construct()
    {
        $this->About = new About;
        $this->Contact = new Contact;
        $this->Interests = new Interests;
        $this->Index = new Index;
        $this->Blog = new Blog;
    }

    public function render($route, $variables = [], $top = false): array
    {
        return [
            'base' => view('base.view.php'),
            'page' => [
                'route' => $route,
                'view' => $route === 'home' ? null : path('views/' . self::$views[$route] . '.view.php'),
                'var' => $variables
            ],
            'menu_at_top' => $top
        ];
    }
}