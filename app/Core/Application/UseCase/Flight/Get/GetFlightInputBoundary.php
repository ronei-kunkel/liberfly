<?php declare(strict_types=1);

namespace App\Core\Application\UseCase\Flight\Get;

final class GetFlightInputBoundary
{

  private string $uuid;

  public function __construct(string $uuid)
  {
    $this->uuid = $uuid;
  }

  public function uuid(): string
  {
    return $this->uuid;
  }
}