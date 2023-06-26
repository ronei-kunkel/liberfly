<?php declare(strict_types=1);

namespace App\Core\Application\UseCase\Flight\Get;

use App\Core\Domain\Entity\Flight\Flight;

final class GetFlightOutputBoundary
{

  private ?array $flight;

  public function __construct(?array $flight)
  {
    $this->flight = $flight;
  }

  public function flight(): ?array
  {
    return $this->flight;
  }
}