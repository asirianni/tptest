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
        $win=$this->player;
        //aca la comparacion
        return $win;
    }

    
}