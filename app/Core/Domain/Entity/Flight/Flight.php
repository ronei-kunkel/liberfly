<?php declare(strict_types=1);

namespace App\Core\Domain\Entity\Flight;

final class Flight
{
  private string $id;
  private string $origin;
  private string $destiny;

  private function __construct(string $id, string $origin, string $destiny)
  {
    $this->id = $id;
    $this->origin = $origin;
    $this->destiny = $destiny;
  }

  public static function new(string $id, string $origin,string $destiny)
  {
    return new Flight($id, $origin, $destiny);
  }

	/**
	 * @return string
	 */
	public function id(): string {
		return $this->id;
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