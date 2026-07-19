<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreMatchRequest;
use App\Http\Requests\UpdateMatchRequest;
use App\Models\GameMatch;
use App\Models\Player;

class MatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matches = GameMatch::withCount('players')->orderBy('match_date','desc')->paginate(10);        

        return view("matches.index", compact("matches"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("matches.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMatchRequest $request)
    {
        $match=GameMatch::create($request->validated());

        return redirect()->route("matches.show",$match)->with("status","Match created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(GameMatch $match)
    {
        $match->load("players");
        $allPlayers= Player::orderBy('first_name')->get();
        return view('matches.show', compact('match','allPlayers'));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GameMatch $match)
    {
        return view('matches.edit', compact('match'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMatchRequest $request, GameMatch $match)
    {
        $match->update($request->validated());
        return redirect()->route('matches.show',$match)->with('status','Match updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GameMatch $match)
    {
        $match->delete();
        return redirect()->route('matches.index')->with('status','Match deleted successfully');
    }
}
