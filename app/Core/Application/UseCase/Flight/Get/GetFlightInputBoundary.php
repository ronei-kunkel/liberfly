<?php declare(strict_types=1);

namespace App\Core\Application\UseCase\Flight\Get;

final class GetFlightInputBoundary
{

  private string $id;

  public function __construct(string $id)
  {
    $this->id = $id;
  }

  public function id(): string
  {
    return $this->id;
  }
}