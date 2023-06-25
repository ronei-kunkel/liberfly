<?php declare(strict_types=1);

namespace App\Core\Domain\Entity;

interface UuidInterface
{
  public function generate(): string;
}