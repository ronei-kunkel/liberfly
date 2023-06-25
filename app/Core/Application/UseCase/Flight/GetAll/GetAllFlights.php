<?php declare(strict_types=1);

namespace App\Core\Application\UseCase\Flight\GetAll;

use App\Core\Application\UseCase\Flight\GetAll\GetAllFlightsOutputBoundary;
use App\Core\Domain\Repository\Flight\FlightRepository;

final class GetAllFlights
{
  private FlightRepository $repository;

  public function __construct(FlightRepository $repository)
  {
    $this->repository = $repository;
  }

  public function execute() : GetAllFlightsOutputBoundary
  {
    $flights = $this->repository->getAll();

    return new GetAllFlightsOutputBoundary($flights);
  }
}