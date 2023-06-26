<?php declare(strict_types=1);

namespace App\Core\Infra\Auth;

use App\Core\Application\Service\Auth\AuthServiceInterface;
use Exception;
use Tymon\JWTAuth\Facades\JWTAuth;

final class TymonJwtAuth implements AuthServiceInterface
{
    public function login(array $credentials): string
    {
        if(empty($credentials)){
            throw new Exception('Credenciais não fornecidas', 400);
        }

        if (!$token = JWTAuth::attempt($credentials)) {
            throw new Exception('Credenciais inválidas', 401);
        }

        return $token;
    }
}