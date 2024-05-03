<?php

namespace Src\Controllers;

use Src\Models\About;
use Src\Models\Contact;
use Src\Models\Interests;
use Src\Models\Index;
use Src\Models\Blog;
use Src\Http\Forms\LoginForm;
use Src\Models\Redirect;
use Src\Models\User;
use Src\Http\Middleware\UserVerify;

abstract class AbstractController
{
    protected About $About;
    protected Contact $Contact;
    protected Interests $Interests;
    protected Index $Index;
    protected Blog $Blog;
    protected LoginForm $LoginForm;
    protected User $User;
    protected Redirect $Redirect;
    protected UserVerify $UserVerify;
    protected ?int $uid;
    public ?array $userInfo;
    private static array $views = [
        'about' => 'about/about',
        'contact' => 'contact/contact',
        'interests' => 'interests/interests',
        'blog' => 'blog/blog',
        'index' => 'index/index',
        'login' => 'login/login',
        'register' => 'register/register',
        'error' => 'error/error',
        'edit' => 'edit/edit',
        'redirect' => 'redirect/redirect'
    ];

    public function __construct()
    {
        $this->About = new About;
        $this->Contact = new Contact;
        $this->Interests = new Interests;
        $this->Index = new Index;
        $this->Blog = new Blog;
        $this->LoginForm = new LoginForm;
        $this->User = new User;
        $this->UserVerify = new UserVerify;
        $this->Redirect = new Redirect;
        $this->userInfo = $this->UserVerify->handle();
        $this->uid = $this->userInfo['data']['uid'] ?? 1;
    }

    protected function render($route, $variables = [], $top = false): array
    {
        return [
            'base' => view('base.view.php'),
            'page' => [
                'route' => $route,
                'title' => $route === 'home' ? "Personal website" : ucfirst($route),
                'view' => $route === 'home' ? null : path('views/' . self::$views[$route] . '.view.php'),
                'var' => $variables
            ],
            'menu_at_top' => 1, // Currently set to 1 statically, otherwise use $top.
            'user' => $this->userInfo
        ];
    }
}