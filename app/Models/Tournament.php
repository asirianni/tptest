<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    use HasFactory;
    protected $table = 'tournaments';
    
    protected $fillable = [
        'id',
        'phases',
        'player_type_id',
        'number_players',
    ];

    protected $filterable = [
        'id',
        'phases',
        'player_type_id',
        'number_players',
    ];

    public function matches()
    {
        return $this->hasMany(Match::class, 'tournament_id');
    }

    public function players()
    {
        return $this->belongsToMany(Player::class, 'matches', 'tournament_id', 'player_play_id')
            ->withPivot('id', 'opponent_play_id', 'winer_play_id');
    }

}


