<?php declare(strict_types=1);

namespace App\Core\Application\UseCase\Flight\GetAll;

use App\Core\Application\UseCase\Flight\GetAll\GetAllFlightsOutputBoundary;
use App\Core\Domain\Repository\Flight\FlightRepositoryInterface;

final class GetAllFlights
{
  private FlightRepositoryInterface $repository;

  public function __construct(FlightRepositoryInterface $repository)
  {
    $this->repository = $repository;
  }

  public function execute() : GetAllFlightsOutputBoundary
  {
    $flights = $this->repository->getAll();

    return new GetAllFlightsOutputBoundary($flights);
  }
}