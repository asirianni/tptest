<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    use HasFactory;
    protected $table = 'tournaments';
    
    protected $fillable = [
        'phases',
        'player_type_id',
        'number_players',
    ];

    protected $filterable = [
        'phases',
        'player_type_id',
        'number_players',
    ];
}
