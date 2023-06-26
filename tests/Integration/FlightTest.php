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
    $response = $this->get('/api/flight')->withHeaders(['Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0L2FwaS9sb2dpbiIsImlhdCI6MTY4Nzc0NjQ4NywiZXhwIjoxNjg3NzUwMDg3LCJuYmYiOjE2ODc3NDY0ODcsImp0aSI6ImFld0M1dlhmM3UxVWowRFAiLCJzdWIiOiI1ZDc0YTUwYy1lNzZmLTQzN2QtOGJlNy03NWYwNGI4YzE1NzEiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.PeYpYf_fomQ_1MPbJf0_2BoJgOASTufrg720h01fEtY']);

    print_r($response);

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