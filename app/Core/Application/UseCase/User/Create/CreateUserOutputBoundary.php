<?php declare(strict_types=1);

namespace App\Core\Application\UseCase\User\Create;

use App\Core\Domain\Entity\User\User;

final class CreateUserOutputBoundary
{

  private User $user;

  public function __construct(User $user)
  {
    $this->user = $user;
  }

  public function user(): User
  {
    return $this->user;
  }
}