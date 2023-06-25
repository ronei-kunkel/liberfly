<?php declare(strict_types=1);

namespace App\Core\Infra\Http\Controller\Api\Flight;
use Illuminate\Http\Request;

final class FlightApiController
{
  public function index(Request $request)
  {
    return response()->json($request);
  }
}