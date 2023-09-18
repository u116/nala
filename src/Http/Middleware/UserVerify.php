<?php

namespace Src\Http\Middleware;

use Src\Models\User;
use Src\Models\UserSession;

class UserVerify
{
    private UserSession $UserSession;
    private User $User;
    private int $uid;
    private array $cookieKeys = [
        'token'
    ];
    private ?array $userCookies;

    public function __construct()
    {
        $this->User = new User;
        $this->UserSession = new UserSession;
    }

    public function handle(int $uid = null)
    {
        if ($this->getUserCookies()) {
            return $this->getUserSession($this->uid = (new UserSession)->getUidFromToken(self::getTokenFromCookie()));
        }
        if (is_int($uid) && $this->UserSession->makeSession($uid)) {
            (new Cookie)->setCookies([
                'token' => [
                    'data' => $this->UserSession->token,
                    'duration' => 2.5
                ]
            ]);
            return true;
        } else {
            return null;
        }
    }

    public function getUserCookies(): bool
    {
        foreach ($this->cookieKeys as $key) {
            if (!isset($_COOKIE[$key])) return false;
        }

        $this->userCookies = empty($_COOKIE) ? null : $_COOKIE;
        return true;
    }

    public static function getTokenFromCookie(): ?string
    {
        return $_COOKIE['token'] ?? null;
    }

    public function getUserSession(int $uid): ?array
    {
        return [
            'data' => $this->User->getUserInfo($uid),
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