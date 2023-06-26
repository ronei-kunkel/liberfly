<?php declare(strict_types=1);

namespace App\Core\Application\UseCase\Flight\Get;

use App\Core\Application\UseCase\Flight\Get\GetFlightInputBoundary;
use App\Core\Application\UseCase\Flight\Get\GetFlightOutputBoundary;
use App\Core\Domain\Repository\Flight\FlightRepositoryInterface;

final class GetFlight
{
  private FlightRepositoryInterface $repository;

  public function __construct(FlightRepositoryInterface $repository)
  {
    $this->repository = $repository;
  }

  public function execute(GetFlightInputBoundary $input) : GetFlightOutputBoundary
  {
    $flight = $this->repository->get($input->id());

    return new GetFlightOutputBoundary($flight);
  }
}