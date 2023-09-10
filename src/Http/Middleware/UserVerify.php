<?php

namespace Src\Http\Middleware;

use Src\Models\User;
use Src\Models\UserSession;
use Src\Http\Middleware\Cookie;

class UserVerify
{
    private UserSession $UserSession;
    private User $User;
    private int $uid;
    private array $cookieKeys = [
        'uid',
        'token',
        'date'
    ];
    private ?array $userCookies;
    private ?array $userSession;

    public function __construct()
    {
        $this->User = new User;
        $this->UserSession = new UserSession;
    }

    public function handle(int $uid = null)
    {
        if ($this->getUserCookies()) {
            return $this->getUserSession($this->userCookies['uid']);
        }
        if (is_int($uid) && $this->UserSession->makeSession($uid)) {
            (new Cookie)->setCookies([
                'uid' => [
                    'data' => $uid,
                    'duration' => '1m'
                ],
                'token' => [
                    'data' => $this->UserSession->token,
                    'duration' => '1m'
                ]
            ]);
            return true;
        } else {
            return null;
        }
    }

    public function getUserCookies(): bool
    {
        foreach ($this->cookieKeys as $key => $value) {
            if (!isset($_COOKIE[$key])) return false;
        }

        $this->userCookies = empty($_COOKIE) ? null : $_COOKIE;
        return true;
    }

    public function getUserSession(int $uid): ?array
    {
        return $this->userSession = [
            'user' => $this->User->getSessionInfo($uid),
            'token' => $this->UserSession->getToken($uid),
        ];
    }

    private function ipToBinary(string $ip)
    {
        return inet_pton($_SERVER['REMOTE_ADDR']);
    }

    private function binaryToIp(string $ip)
    {
        return inet_ntop($ip);
    }
}