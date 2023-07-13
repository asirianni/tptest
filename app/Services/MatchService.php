<?php

namespace App\Services;
use App\Models\Match;
use App\Models\Player;

class MatchService{
    private $tournament_id;
    private $player;
    private $opponent;

    public function __construct($tournament_id,$player,$opponent) {
        $this->tournament_id = $tournament_id;
        $this->player = $player;
        $this->opponent = $opponent;
    }

    public function persist(){

        $win=$this->win();
        $match = new Match;
        $match->tournament_id = $this->tournament_id;
        $match->player_play_id = $this->player->id;
        $match->opponent_play_id = $this->opponent->id;
        $match->winer_play_id =$win->id;
        $match->save();

        return $win;
    }

    public function win(){
        $win=0;
        
        //guardo los puntajes
        $points_player_1=0;
        $points_player_2=0;

        ($this->playMatch($this->player->ability,$this->opponent->ability))?$points_player_1++:$points_player_2++;
        
        ($this->playMatch($this->player->speed,$this->opponent->speed))?$points_player_1++:$points_player_2++;
        
        //si es masculino se tiene en cuenta la fuerza
        if($this->player->player_type_id===2){
            ($this->playMatch($this->player->force,$this->opponent->force))?$points_player_1++:$points_player_2++;
        }
        
        //agrego un elemento de azar en el juego
        ( rand(0, 1) === 1) ? $points_player_1++ : $points_player_2++;

        ($points_player_1 > $points_player_2) ? $win=$this->player : $win=$this->opponent;

        return $win;
    }

    // se juega con las metricas de cada jugador y si el jugador 1 
    // resulta superior al 2
    // se anota punto para el jugador 1 sino para el jugador 2
    public function playMatch($metricPlayer1,$metricPlayer2){
        $point=false;
        
        if($metricPlayer1>$metricPlayer2){
            $point=true;
        }
        return $point;
    }

    
}