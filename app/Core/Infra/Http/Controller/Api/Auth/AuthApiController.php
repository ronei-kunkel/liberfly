<?php declare(strict_types=1);

namespace App\Core\Infra\Http\Controller\Api\Auth;

use App\Core\Application\UseCase\Authentication\Login;
use Exception;
use Illuminate\Http\Request;

final class AuthApiController
{
  private Login $login;

  public function __construct(Login $login) {
    $this->login = $login;
  }

  public function login(Request $request)
  {
    $credentials = $request->only('email', 'password');

    try {

      $token = $this->login->execute($credentials);

      return response()->json([
        'status' => 'success',
        'token' => $token
      ]);

    } catch (Exception $exception) {

      return response()->json([
        'status' => 'error',
        'message' => $exception->getMessage()
      ], 401);

    }
  }
}