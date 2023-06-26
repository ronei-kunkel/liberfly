<?php declare(strict_types=1);

namespace Tests\Integration;

use Tests\TestCase;

final class AuthTest extends TestCase
{

  public function test_login()
  {
    $response = $this->post('http://localhost/api/login', [
      'email' => 'ronei.kunkel@gmail.com',
      'password' => 'password'
    ]);

echo "<pre style='margin-left:260px;'>";
print_r($response->json());
echo "</pre>";
exit;

    $response->assertStatus(200);
    $response->assertJsonFragment([
      'status' => 'success'
  ]);
  }
}