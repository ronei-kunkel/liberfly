<?php declare(strict_types=1);

namespace App\Core\Application\UseCase\Flight\GetAll;

final class GetAllFlightsOutputBoundary
{
  private array $flights;

  public function __construct(array $flights)
  {
    $this->flights = $flights;
  }

  public function flights(): array
  {
    return $this->flights;
  }
}