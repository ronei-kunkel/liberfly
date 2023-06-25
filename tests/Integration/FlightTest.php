<?php declare(strict_types=1);

namespace Tests\Integration;

use Tests\TestCase;

final class FlightTest extends TestCase
{
  /**
   * Espera que a rota /api/flight retorne 200, ou seja, sucesso
   */
  public function test_Success_Status_Code_on_Acess_Flights_Resource()
  {
    $response = $this->get('/api/flight');

    $response->assertStatus(200);
  }

  /**
   * Espera que ao acessar o recurso /api/flight seja retornada uma coleção de Voos, existindo voos ou não
   */
  public function test_Return_Collection_of_Fligths_on_Access_Flights_Resource()
  {

    

  }

  /**
   * Espera que retorne uma coleção de voos ao acessar um voo específico, existindo voos ou não
   */
  public function test_Return_Collection_of_Flight_on_Access_Specific_Flight_Resource()
  {

  }


}