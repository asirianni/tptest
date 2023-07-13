<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PlayerResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'ability' => $this->ability,
            'force' => $this->force,
            'speed' => $this->speed,
        ];
    }
}





