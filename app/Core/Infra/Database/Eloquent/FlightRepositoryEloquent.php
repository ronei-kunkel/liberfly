<?php declare(strict_types=1);

namespace App\Core\Infra\Database\Eloquent;

use App\Core\Domain\Entity\Flight\Flight;
use App\Core\Domain\Repository\Flight\FlightRepositoryInterface;
use App\Models\Flight as FlightModel;
use Exception;
use Illuminate\Foundation\Testing\RefreshDatabase;

final class FlightRepositoryEloquent implements FlightRepositoryInterface
{
  use RefreshDatabase;
  public function get(string $id): ?array
  {
    $flight = FlightModel::where('id', $id)->first();

    return empty($flight) ? throw new Exception("Voo não encontrado", 404) : $flight->toArray($flight);
  }

  public function getAll(): array
  {
    $flights = FlightModel::all();

    $flights = $flights->map(function ($flights) {
      return $flights->toArray();
    });

    return $flights->all();
  }
}