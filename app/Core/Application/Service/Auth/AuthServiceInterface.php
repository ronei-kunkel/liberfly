<?php declare(strict_types=1);

namespace App\Core\Application\Service\Auth;

interface AuthServiceInterface
{
  public function login(array $credentials): string;
}