<?php declare(strict_types=1);

namespace App\Core\Domain\Repository\User;

use App\Core\Domain\Entity\User\User;

interface UserRepositoryInterface
{
  public function create(string $id, string $name, string $email, string $password): false|User;
}