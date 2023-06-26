<?php declare(strict_types=1);

namespace App\Core\Infra\Password;

use App\Core\Application\Service\Password\PassowrdHashingInterface;

final class PasswordHashingPhpDefault implements PassowrdHashingInterface
{

  public function execute(string $password): string
  {
    return password_hash($password, PASSWORD_DEFAULT);
  }
}
