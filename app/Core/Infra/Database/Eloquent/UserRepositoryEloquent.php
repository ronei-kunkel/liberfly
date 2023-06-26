<?php declare(strict_types=1);

namespace App\Core\Infra\Database\Eloquent;

use App\Core\Domain\Entity\User\User;
use App\Core\Domain\Repository\User\UserRepositoryInterface;
use App\Models\User as UserModel;
use Exception;

final class UserRepositoryEloquent implements UserRepositoryInterface
{
  public function create(string $id, string $name, string $email, string $password): false|User
  {

    $execution = (new UserModel([
      'id' => $id,
      'name' => $name,
      'email' => $email,
      'password' => $password
    ]))->save();

    if(!$execution) throw new Exception("Falha ao registrar usuário", 500);

    return User::new($id, $name, $email, $password);
  }
}