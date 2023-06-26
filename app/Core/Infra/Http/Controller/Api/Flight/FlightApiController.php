<?php declare(strict_types=1);

namespace App\Core\Infra\Http\Controller\Api\Flight;
use App\Core\Application\UseCase\Flight\Get\GetFlight;
use App\Core\Application\UseCase\Flight\Get\GetFlightInputBoundary;
use App\Core\Application\UseCase\Flight\GetAll\GetAllFlights;
use App\Core\Infra\Database\Eloquent\FlightRepositoryEloquent;
use Exception;

/**
 * @OA\Get(
 *     path="/api/flight",
 *     summary="Endpoint para obter a lista de voos",
 *     tags={"Voos"},
 *     @OA\Parameter(
 *         name="Authorization",
 *         in="header",
 *         description="Token de autenticação JWT",
 *         required=true,
 *         @OA\Schema(type="string", format="Bearer {token}")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Sucesso",
 *         @OA\JsonContent(
 *             type="array",
 *             @OA\Items(
 *                 @OA\Property(property="id", type="string", example="f47ac10b-58cc-4372-a567-0e02b2c3d479"),
 *                 @OA\Property(property="origin", type="string", example="New York"),
 *                 @OA\Property(property="destiny", type="string", example="Los Angeles")
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Não autenticado"
 *     )
 * )
 */


/**
 * @OA\Get(
 *     path="/api/flight/{id}",
 *     summary="Endpoint para obter um voo pelo ID",
 *     tags={"Voos"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="ID do voo",
 *         required=true,
 *         @OA\Schema(type="string")
 *     ),
 *     @OA\Parameter(
 *         name="Authorization",
 *         in="header",
 *         description="Token de autenticação JWT",
 *         required=true,
 *         @OA\Schema(type="string", format="Bearer {token}")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Sucesso",
 *         @OA\JsonContent(
 *             @OA\Property(property="id", type="string", example="d56e1a23-9a6c-4c11-bcbf-9f85b94dc6c5"),
 *             @OA\Property(property="origin", type="string", example="Los Angeles"),
 *             @OA\Property(property="destiny", type="string", example="New York")
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Não autenticado"
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Não encontrado"
 *     )
 * )
 */
final class FlightApiController
{
  public function index(FlightApiFormRequestValidator $request)
  {
    try {

      $useCase = new GetAllFlights(new FlightRepositoryEloquent);

      $output = $useCase->execute();

      $flights = $output->flights();

      return response()->json([
        'status' => 'success',
        'flights' => $flights
      ]);

    } catch (Exception $e) {

      return response()->json([
        'status' => 'error',
        'message' => $e->getMessage()
      ], $e->getCode());
    }

    
  }

  public function show(FlightApiFormRequestValidator $request, $id)
  {
    try {

      $useCase = new GetFlight(new FlightRepositoryEloquent);

      $output = $useCase->execute(new GetFlightInputBoundary($id));

      $flight = $output->flight();

      return response()->json([
        'status' => 'success',
        'flight' => $flight
      ]);

    } catch (Exception $e) {

      return response()->json([
        'status' => 'error',
        'message' => $e->getMessage()
      ], $e->getCode());

    }
  }
}