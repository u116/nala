<?php

namespace Src\Routes;

use Src\Controllers\ResponseController;

class Router
{
    public string $uri;
    public array $uriGuide;
    private string|null $route;
    private static string $controllersPath = '\Src\Controllers\\';

    private static array $routes = [
        '/' => 'home',
        '/about' => 'about',
        '/contact' => 'contact',
        '/interests' => 'interests',
        '/blog' => 'blog',
        '/index' => 'index'
    ];
    

    public function __construct()
    {
        $this->uri = parse_url($_SERVER['REQUEST_URI'])['path'];
        $this->uriGuide = explode('/', $this->uri);
        $this->route = self::$routes[$this->uri] ?? null;
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

        if (is_null($this->route)) return $this->abort(new ResponseController);

        return $this->controller($this->route)->$method();
    }

    protected function abort(ResponseController $object, $httpCode = 404): array
    {
        return $object->httpCodeResponse($httpCode);
    }
}