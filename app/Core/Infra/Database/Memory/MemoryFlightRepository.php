<?php declare(strict_types=1);

namespace App\Core\Infra\Database\Memory;

use App\Core\Domain\Entity\Flight\Flight;
use App\Core\Domain\Repository\Flight\FlightRepositoryInterface;
use App\Core\Application\Service\Uuid\Uuidv4;
final class MemoryFlightRepository implements FlightRepositoryInterface
{
  public function get(string $uuid): Flight
  {
    return Flight::new($uuid, 'Pel', 'Poa');
  }

  public function getAll(): array
  {
    return [
      Flight::new((new Uuidv4())->generate(), 'Pel', 'Poa'),
      Flight::new((new Uuidv4())->generate(), 'Gru', 'Cwb'),
      Flight::new((new Uuidv4())->generate(), 'Gal', 'Pel')
    ];
  }
}