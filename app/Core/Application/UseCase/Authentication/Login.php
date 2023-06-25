<?php declare(strict_types=1);

namespace App\Core\Application\UseCase\Authentication;

use App\Core\Application\Service\Auth\AuthServiceInterface;

final class Login
{
  private AuthServiceInterface $authService;

  public function __construct(AuthServiceInterface $authService)
  {
    $this->authService = $authService;
  }

  public function execute(array $credentials): string
  {
    return $this->authService->login($credentials);
  }
}
