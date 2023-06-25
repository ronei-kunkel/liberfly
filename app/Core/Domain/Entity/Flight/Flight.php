<?php declare(strict_types=1);

namespace App\Core\Domain\Entity\Flight;

final class Flight
{
  private string $uuid;
  private string $origin;
  private string $destiny;

  private function __construct(string $uuid, string $origin, string $destiny)
  {
    $this->uuid = $uuid;
    $this->origin = $origin;
    $this->destiny = $destiny;
  }

  public static function new(string $uuid, string $origin,string $destiny)
  {
    return new Flight($uuid, $origin, $destiny);
  }

	/**
	 * @return string
	 */
	public function uuid(): string {
		return $this->uuid;
	}
	
	/**
	 * @return string
	 */
	public function origin(): string {
		return $this->origin;
	}
	
	/**
	 * @return string
	 */
	public function destiny(): string {
		return $this->destiny;
	}
}