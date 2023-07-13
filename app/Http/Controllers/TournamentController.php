<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TournamentRequest;
use App\Http\Resources\TournamentResource;
use App\Models\Tournament;
use App\Models\Player;
use App\Services\TournamentService;

class TournamentController extends Controller
{
    
    public function index()
    {
        // Obtiene todos los torneos
        $tournaments = Tournament::all();
        return response()->json($tournaments);
    }

    
    public function store(TournamentRequest $request)
    {
        $validatedData = $request->all();
        $tournament = new TournamentService($validatedData['partidos'],$validatedData['tipo']);
        return new TournamentResource($tournament->persist());

    }


}
