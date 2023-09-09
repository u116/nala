<?php

namespace Src\Http\Middleware;

use Src\Models\UserSession;

class UserVerify
{
    public function handle(int $uid): ?string
    {
        return (new UserSession)->makeSession($uid) ?? null;
    }

    private function ipToBinary(string $ip)
    {
        return inet_pton($_SERVER['REMOTE_ADDR']);
    }

    private function binaryToIp(string $ip)
    {
        return inet_ntop($ip);
    }

    private static function generateToken(): string
    {
        return hash('sha256', random_bytes(12));
    }
}