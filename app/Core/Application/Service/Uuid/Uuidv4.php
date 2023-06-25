<?php

namespace App\Core\Application\Service\Uuid;

use App\Core\Domain\Entity\UuidInterface;
use Ramsey\Uuid\Uuid;

final class Uuidv4 implements UuidInterface
{
  public function generate(): string
  {
    return Uuid::uuid4()->toString();
  }
}
