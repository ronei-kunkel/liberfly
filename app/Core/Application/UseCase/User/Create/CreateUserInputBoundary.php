<?php declare(strict_types=1);

namespace App\Core\Application\UseCase\User\Create;

final class CreateUserInputBoundary
{

  private string $name;
  private string $email;
  private string $password;

  public function __construct(string $name, string $email, string $password)
  {
    $this->name = $name;
    $this->email = $email;
    $this->password = $password;
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