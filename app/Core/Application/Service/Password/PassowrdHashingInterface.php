<?php declare(strict_types=1);

namespace App\Core\Application\Service\Password;

interface PassowrdHashingInterface
{
  public function execute(string $credentials): string;
}