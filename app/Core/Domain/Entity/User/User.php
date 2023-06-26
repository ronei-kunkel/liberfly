<?php declare(strict_types=1);

namespace App\Core\Domain\Entity\User;

final class User
{
  private string $id;
  private string $name;
  private string $email;
  private string $password;

  private function __construct(string $id, string $name, string $email, string $password)
  {
    $this->id = $id;
    $this->name = $name;
    $this->email = $email;
    $this->password = $password;
  }

  public static function new(string $id, string $name, string $email, string $password): self
  {
    return new User($id, $name, $email, $password);
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
	public function name(): string {
		return $this->name;
	}
	
	/**
	 * @return string
	 */
	public function email(): string {
		return $this->email;
	}
	
	/**
	 * @return string
	 */
	public function password(): string {
		return $this->password;
	}
	
}