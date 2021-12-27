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
        //coordenadas punto 1 
        $p1["latitud"]=-1;
        $p1["longitud"]=7;

        //cordenadas punto 2
        $p2["latitud"]=3;
        $p2["longitud"]=4;

        //calculo distancia
        $distancia=Farmacia::calculo_distancia($p1,$p2);
        
        //el calculo de la distancia entre los 2 puntos dados es de 5
        $this->assertEquals(5,$distancia);
    }
}
