<?php declare(strict_types=1);

namespace App\Core\Infra\Http\Controller\Api\Auth;

use App\Core\Application\UseCase\Authentication\Login;
use Exception;
use Illuminate\Http\Request;


/**
 * @OA\Info(
 *     title="Flights api",
 *     version="1.0.0",
 *     description="Api que fornece acesso a voos"
 * )
 * @OA\PathItem(
 *     path="/api/login",
 *     @OA\Post(
 *        path="/api/login",
 *        summary="Endpoint para autenticação de usuário",
 *        tags={"Autenticação"},
 *        @OA\RequestBody(
 *            description="Dados de autenticação",
 *            required=true,
 *            @OA\JsonContent(
 *                @OA\Property(property="email", type="string", format="email", example="user@example.com"),
 *                @OA\Property(property="password", type="string", minLength=6, format="password", example="secret")
 *            )
 *        ),
 *        @OA\Response(
 *            response=200,
 *            description="Sucesso",
 *            @OA\JsonContent(
 *                @OA\Property(property="status", type="string", example="success"),
 *                @OA\Property(property="token", type="string", example="Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9...")
 *            )
 *        ),
 *        @OA\Response(
 *            response=401,
 *            description="Não autorizado",
 *            @OA\JsonContent(
 *                @OA\Property(property="status", type="string", example="error"),
 *                @OA\Property(property="message", type="string", example="Credenciais inválidas")
 *            )
 *        ),
 *        @OA\Response(
 *            response=404,
 *            description="Não encontrado",
 *            @OA\JsonContent(
 *                @OA\Property(property="status", type="string", example="error"),
 *                @OA\Property(property="message", type="string", example="Credenciais não fornecidas")
 *            )
 *        )
 *    )
 * )
 */
final class AuthApiController
{
  private Login $login;

  public function __construct(Login $login) {
    $this->login = $login;
  }

  public function login(AuthApiFormRequestValidator $request)
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
      ], $exception->getCode());

    }
  }
}