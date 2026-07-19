<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePlayerRequest;
use App\Http\Requests\UpdatePlayerRequest;
use App\Models\Player;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $players = Player::OrderBy("first_name","asc")->paginate(10);

        return view("players.index", compact("players"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("players.create");
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePlayerRequest $request)
    {
        player::create($request->validated());
        return redirect()->route("players.index")->with("status","player added successfully");
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Player $player)
    {
        return view('players.edit', compact('player'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePlayerRequest $request, Player $player)
    {
        $data = $request->validated();
        if(empty($data['password'])){
            unset($data['password']);
        }
        $player->update($data);
        return redirect()->route('players.edit',$player)->with('status','Player updateed succesfully');
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Player $player)
    {
        $player->delete();
        return redirect()->route('players.index')->with('status','Player deleted successfully');
    }
}
