<?php

namespace Tests\Feature\app\Services;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Services\Farmacia;

class FarmaciaTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_dominio_creacion_exitosa()
    {
        //campos ingresados correctamente
        // nombre string
        // direccion string
        // latitud numerico
        // longitud Numerico

        $service=new Farmacia("Farmacia 1", "Balcarce 65", 36.655896, -69.699858);
        $validacion=$service->validar_campos();
        $this->assertTrue($validacion["exito"]);
        
    }

    public function test_dominio_creacion_no_exitosa()
    {
        //campo latitud no numerico ->falla la validacion
        $service=new Farmacia("Farmacia 1", "Balcarce 65", "sdssds", -69.699858);
        $validacion=$service->validar_campos();
        $this->assertFalse($validacion["exito"]);
    }

    public function test_calculo_distancia()
    {
        $response = $this->get('/api/farmacia');

        $response->assertStatus(200);
    }
}
