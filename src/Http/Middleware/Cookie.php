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
     *          'duration' => '2|5|7.5'
     *     ]
     * ]
     */
    public function setCookies(array $cookies): void
    {
        foreach ($cookies as $key => $value) {
            setcookie($key, $value['data'], strtotime(self::setDuration($value['duration'])));
        }
    }

    public function killCookies(): void
    {
        foreach ($_COOKIE as $key => $value) {
            setcookie($key, '', time()-1000);
            setcookie($key, '', time()-1000, '/');
        }
    }

    private static function setDuration(float $months): string
    {
        return 'NOW+'.(($months <= 13) ? round($months*30) : 30).'DAYS';
    }
}