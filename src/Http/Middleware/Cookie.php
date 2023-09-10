<?php

namespace Src\Http\Middleware;

class Cookie
{
    private array $duration = [
        '1m' => 'NOW+30DAYS',
        '2m' => 'NOW+60DAYS'
    ];


    /**
     * @param array $cookies
     * @return void
     * $cookies = [
     *     'cookie1' => [
     *          'data' => 'cookie1value',
     *          'duration' => '2m'
     *     ]
     * ]
     */
    public function setCookies(array $cookies): void
    {
        foreach ($cookies as $key => $value) {
            setcookie($key, $value['data'], strtotime($this->duration[$value['duration']]));
        }
    }

    public function killCookies(): void
    {
        foreach ($_COOKIE as $key => $value) {
            setcookie($key, '', time()-1000);
            setcookie($key, '', time()-1000, '/');
        }
    }
}