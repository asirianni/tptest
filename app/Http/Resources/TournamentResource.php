<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TournamentResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'torneo num' => $this->id,
            'tipo' => ($this->player_type_id==2)?"masculino":"femenino",
            'cant partidos' => $this->phases,
            'cant jugadores' => $this->number_players,
            'matches' => MatchResource::collection($this->matches),
        ];
    }
}
