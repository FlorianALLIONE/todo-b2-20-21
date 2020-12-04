<?php

namespace App\Http\Controllers;

use App\Models\{ BoardUser, Task, Board, User };
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BoardUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Renvoi une vue à laquelle on transmet les boards de l'utilisateurs (ceux auxquels il participe)
        $user = Auth::user();
        return view('boardusers.index', ['user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $board = new Board();
        $user = Auth::user();
        $users = new User();
        return view('boardusers.create', ['user' => $user, 'board' => $board, 'users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'board_id' => 'string',
            'user_id' => 'string'
        ]);
        $boardUser = new BoardUser();
        $user = new User(); 
        $boardUser->board_id = $validatedData['board_id'];
        $boardUser->user_id = $validatedData['user_id'];

        $boardUser->save(); 
        return redirect('/boards');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BoardUser  $boardUser
     * @return \Illuminate\Http\Response
     */
    public function show(BoardUser $boardUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BoardUser  $boardUser
     * @return \Illuminate\Http\Response
     */
    public function edit(BoardUser $boardUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BoardUser  $boardUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BoardUser $boardUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BoardUser  $boardUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(BoardUser $boardUser)
    {
        //
    }
}
