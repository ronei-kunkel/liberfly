<?php declare(strict_types=1);

namespace App\Core\Domain\Repository\Flight;

use App\Core\Domain\Entity\Flight\Flight;

interface FlightRepositoryInterface
{
  public function get(string $id): ?array;

  public function getAll(): array;
}