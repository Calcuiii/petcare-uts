// app/Services/JwtService.php
<?php

namespace App\Services;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use App\Models\User;

class JwtService
{
    private string $secretKey;
    private string $algorithm;

    public function __construct()
    {
        $this->secretKey = env('JWT_SECRET', 'your-secret-key-here');
        $this->algorithm = 'HS256';
    }

    public function generateToken(User $user): string
    {
        $payload = [
            'user_id' => $user->id,
            'email' => $user->email,
            'role' => $user->role,
            'iat' => time(),
            'exp' => time() + (60 * 60 * 24) // 24 hours
        ];

        return JWT::encode($payload, $this->secretKey, $this->algorithm);
    }

    public function validateToken(string $token): ?object
    {
        try {
            $decoded = JWT::decode($token, new Key($this->secretKey, $this->algorithm));
            return $decoded;
        } catch (\Exception $e) {
            return null;
        }
    }

    public function getUserFromToken(string $token): ?User
    {
        $decoded = $this->validateToken($token);
        if ($decoded && isset($decoded->user_id)) {
            return User::find($decoded->user_id);
        }
        return null;
    }
}