<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    use HasFactory;
    protected $table = 'matches';
    protected $fillable = [
        'id',
        'tournament_id',
        'player_play_id',
        'opponent_play_id',
        'winer_play_id',
    ];

    protected $filterable = [
        'id',
        'tournament_id',
        'player_play_id',
        'opponent_play_id',
        'winer_play_id',
    ];
    public function tournament()
    {
        return $this->belongsTo(Tournament::class);
    }

    public function playerPlay()
    {
        return $this->belongsTo(Player::class, 'player_play_id');
    }

    public function opponentPlay()
    {
        return $this->belongsTo(Player::class, 'opponent_play_id');
    }

    public function winnerPlay()
    {
        return $this->belongsTo(Player::class, 'winer_play_id');
    }

}
