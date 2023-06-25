<?php declare(strict_types=1);

namespace App\Core\Application\UseCase\Flight\Get;

use App\Core\Application\UseCase\Flight\Get\GetFlightInputBoundary;
use App\Core\Application\UseCase\Flight\Get\GetFlightOutputBoundary;
use App\Core\Domain\Repository\Flight\FlightRepository;

final class GetFlight
{
  private FlightRepository $repository;

  public function __construct(FlightRepository $repository)
  {
    $this->repository = $repository;
  }

  public function execute(GetFlightInputBoundary $input) : GetFlightOutputBoundary
  {
    $flight = $this->repository->get($input->uuid());

    return new GetFlightOutputBoundary($flight);
  }
}