<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Board;
use App\Models\Liste;
use App\Models\Card;

class BoardsController extends Controller
{

    public function __construct(){
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Lists of boards
     */
    public function boards() {
        $boards  = Board::all();
        return view('boards', compact("boards"));
    }

    /**
     * Store a new board
     */
    public function store() {

        request()->validate([
            'title' => 'required',
            'sub_title' => 'required',
        ]);

        return Board::create([
            'user_id' => auth()->user()->id,
            'title' => request('title'),
            'sub_title' => request('sub_title'),
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $board = Board::find($id);
        $lists  = Liste::all()->where('board_id', $board->id);
        $cards  = Card::all();

        return view('board', compact('board', 'lists', 'cards'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $board = Board::find($id);
        return view('boards.edit')->with('board', $board);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'sub_title' => 'required',
        ]);
        
        $board = Board::find($id);
        $board->title = $request->input('title');
        $board->sub_title = $request->input('sub_title');
        $board->save();

        return redirect('/boards')->with('success', 'Tableau modifé');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $board = Board::find($id);
        $board->delete();

        return redirect('/boards')->with('success', 'Tableau supprimé');
    }
}
