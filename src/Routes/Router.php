<?php

namespace Src\Routes;

use Src\Controllers\ResponseController;

class Router
{
    public ?string $uri;
    public array $uriGuide;
    public ?string $controller;
    private ?string $route;
    private static string $controllersPath = '\Src\Controllers\\';

    private static array $routes = [
        'normal' => [
            '/' => 'home',
            'about' => 'about',
            'contact' => 'contact',
            'interests' => 'interests',
            'blog' => 'blog',
            'index' => 'index',
            'login' => 'login',
            'register' => 'register',
            'logout' => 'logout',
            'edit/about' => 'edit',
            'edit/contact' => 'edit',
            'edit/interests' => 'edit',
            'edit/blog' => 'edit',
            'edit/index' => 'edit',
            'redirect' => 'redirect',
        ],
        'with-slug' => [
            'r' => [
                'route' => 'redirect',
                'dynamic-slug' => true // To be managed by the controller.
            ]
        ]
    ];
    

    public function __construct()
    {
        $this->uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $this->uriGuide = array_values(array_filter(explode('/', $this->uri)));
        $this->route = $this->uriGuide[0] ?? '/';

        $this->controller = self::$routes['normal'][$this->route]
            ?? self::$routes['with-slug'][$this->route]['route']
            ?? null;
    }

    private function controller($route): object
    {
        $namespace = self::$controllersPath . ucfirst($route) . 'Controller';
        return new $namespace;
    }

    public function route($method): array
    {
        if (!in_array($method, [
            'GET',
            'POST',
            'DELETE',
            'PATCH',
            'PUT'
        ])) return $this->abort(new ResponseController, 400);

        if (is_null($this->controller)) return $this->abort(new ResponseController);

        if (self::$routes['with-slug'][$this->route]['dynamic-slug'] ?? false) {
            return $this
                ->controller(self::$routes['with-slug'][$this->route]['route'])
                ->get($this->uriGuide[1] ?? null);
        }

        return $this->controller($this->controller)->$method();
    }

    protected function abort(ResponseController $object, $httpCode = 404): array
    {
        return $object->httpCodeResponse($httpCode);
    }
}