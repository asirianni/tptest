<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MatchResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'playerPlay' => new PlayerResource($this->playerPlay),
            'opponentPlay' => new PlayerResource($this->opponentPlay),
            'winnerPlay' => (new PlayerResource($this->winnerPlay))->name,
        ];
    }
}