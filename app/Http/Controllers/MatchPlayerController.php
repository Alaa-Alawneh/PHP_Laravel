<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SyncMatchPlayersRequest;
use App\Models\GameMatch;

class MatchPlayerController extends Controller
{
    public function update(SyncMatchPlayersRequest $request, GameMatch $match){
        $match->players()->sync($request->validated()['player_ids']??[]);
        return redirect()->route('matches.show',$match)->with('success','Assigned Players updated successfully');
    }
}
