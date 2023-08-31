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
        '/home' => 'home',
        '/about' => 'about',
        '/contact' => 'contact',
        '/interests' => 'interests',
        '/blog' => 'blog',
        '/index' => 'index',
        '/response' => 'response'
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
        ])) $this->abort(new ResponseController);

        if (!isset($this->route)) $this->abort(new ResponseController);

        return $this->controller($this->route)->$method();
    }

    protected function abort($object, $httpCode = 404): void
    {
        http_response_code($httpCode);
        $object->httpCodeResponse($httpCode);
        die();
    }
}