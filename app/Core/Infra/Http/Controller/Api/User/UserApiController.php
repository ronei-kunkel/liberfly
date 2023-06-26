<?php declare(strict_types=1);

namespace App\Core\Infra\Http\Controller\Api\User;
use App\Core\Application\Service\Uuid\Uuidv4;
use App\Core\Application\UseCase\User\Create\CreateUser;
use App\Core\Application\UseCase\User\Create\CreateUserInputBoundary;
use App\Core\Infra\Database\Eloquent\UserRepositoryEloquent;
use App\Core\Infra\Password\PasswordHashingPhpDefault;
use Exception;
use Illuminate\Http\Request;

/**
 * @OA\Post(
 *     path="/api/user",
 *     summary="Cria um novo usuário",
 *     tags={"Usuário"},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             @OA\Property(property="name", type="string"),
 *             @OA\Property(property="email", type="string"),
 *             @OA\Property(property="password", type="string")
 *         )
 *     ),
 *     @OA\Response(
 *         response="200",
 *         description="Sucesso - usuário criado",
 *         @OA\JsonContent(
 *             @OA\Property(property="status", type="string", example="success"),
 *             @OA\Property(
 *                 property="user",
 *                 type="object",
 *                 @OA\Property(property="id", type="string"),
 *                 @OA\Property(property="nome", type="string"),
 *                 @OA\Property(property="email", type="string")
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response="400",
 *         description="Falha na requisição - parâmetros inválidos ou faltantes",
 *         @OA\JsonContent(
 *             @OA\Property(property="success", type="string", example="error"),
 *             @OA\Property(property="message", type="string")
 *         )
 *     )
 * )
 */
final class UserApiController
{
  public function store(UserApiFormRequestValidator $request)
  {
    try {

      $data = $request->only('name', 'email', 'password');

      $input = new CreateUserInputBoundary($data['name'], $data['email'], $data['password']);

      $useCase = new CreateUser(new UserRepositoryEloquent, new Uuidv4, new PasswordHashingPhpDefault);

      $output = $useCase->execute($input);

      return response()->json([
        'status' => 'success',
        'user' => [
          "id" => $output->user()->id(),
          "name" => $output->user()->name(),
          "email" => $output->user()->email()
        ]
      ]);

    } catch (Exception $e) {

      return response()->json([
        'status' => 'error',
        'message' => $e->getMessage()
      ], $e->getCode());

    }
  }
}