<?php declare(strict_types=1);

namespace App\Core\Application\UseCase\Flight\Get;

use App\Core\Domain\Entity\Flight\Flight;

final class GetFlightOutputBoundary
{

  private Flight $flight;

  public function __construct(Flight $flight)
  {
    $this->flight = $flight;
  }

  public function flight(): Flight
  {
    return $this->flight;
  }
}