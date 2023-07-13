<?php

namespace Tests\Feature\app\Services;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Services\TournamentService;
use App\Services\MatchService;
use App\Models\Player;

class TournamentTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_calc_play()
    {
        
        $play=3*2; // valor real
        $torneo=new TournamentService(3, 2);
        $calculo=$torneo->calc_play();

        $this->assertEquals($play,$calculo);
        
    }

   
    public function test_playMatch()
    {
        //buscamos 2 jugadores
        $player1 = Player::find(1);
        $player2 = Player::find(2);
        
        //este seria el calculo a ejecutar
        $point=false;
        if($player1->speed > $player2->speed){
            $point=true;
        }
        $partido=new MatchService(1,$player1, $player2);
        //testeamos el calculo que se ejecuta en el metodo
        $calculo=$partido->playMatch($player1->speed, $player2->speed);
        //si son iguales los resultados pasa el test
        $this->assertEquals($point,$calculo);
    }
}
