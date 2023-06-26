<?php declare(strict_types=1);

namespace App\Core\Application\UseCase\User\Create;

use App\Core\Application\Service\Password\PassowrdHashingInterface;
use App\Core\Application\UseCase\User\Create\CreateUserInputBoundary;
use App\Core\Application\UseCase\User\Create\CreateUserOutputBoundary;
use App\Core\Domain\Entity\UuidInterface;
use App\Core\Domain\Repository\User\UserRepositoryInterface;

final class CreateUser
{
  private UserRepositoryInterface $repository;
  private UuidInterface $uuidGenerator;
  private PassowrdHashingInterface $passwordHasshing;

  public function __construct(UserRepositoryInterface $repository, UuidInterface $uuidGenerator, PassowrdHashingInterface $passwordHasshing)
  {
    $this->repository = $repository;
    $this->uuidGenerator = $uuidGenerator;
    $this->passwordHasshing = $passwordHasshing;
  }

  public function execute(CreateUserInputBoundary $input) : CreateUserOutputBoundary
  {
    $uuid = $this->uuidGenerator->generate();

    $password = $this->passwordHasshing->execute($input->password());

    $user = $this->repository->create($uuid, $input->name(), $input->email(), $password);

    return new CreateUserOutputBoundary($user);
  }
}