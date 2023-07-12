<?php

namespace App\Services;
use App\Models\Tournament;
use App\Models\Player;

class TournamentService{
    private $phases;
    private $player_tipe_id;
    private $number_players;

    public function __construct($phases,$player_tipe_id) {
        $this->phases = $phases;
        $this->player_tipe_id = $player_tipe_id;
    }

    public function persist(){

        // Obtiene la cantidad de jugadores
        $playerCount = Player::where('player_type_id', $this->player_tipe_id)->count();
        

        // Calcula la cantidad mínima de jugadores requerida para los partidos
        $minimumPlayerCount = $this->calc_play();

        
        // Valida si la cantidad mínima de jugadores requerida es menor o igual a la cantidad de jugadores disponibles
        if ($minimumPlayerCount <= $playerCount) {
            return response()->json(['error' => 'No hay suficientes jugadores para organizar los partidos.'], 422);
        }
        //se crea el torneo
        $tournaments = new Tournament;
        $tournaments->phases = $this->phases;
        $tournaments->player_tipe_id = $this->player_tipe_id;
        $tournaments->number_players = $playerCount;
        $tournaments->save();
        
        //creo la logica para generar el juego
    }

    public function calc_play(){
        return $this->phases * 2;
    }
}