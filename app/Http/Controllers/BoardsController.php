<?php

namespace App\Http\Controllers;

use App\Http\Requests\BoardCreateRequest;
use App\Repositories\BoardRepository;
use Illuminate\Http\Request;
use App\Models\Board;
use App\Models\Liste;
use App\Models\Card;

class BoardsController extends Controller
{

    /**
     * @var BoardRepository
     */
    private $boardRepository;

    public function __construct(BoardRepository $boardRepository){
        $this->middleware('auth', ['except' => ['index', 'show']]);
        $this->boardRepository = $boardRepository;
    }

    /**
     * Lists of boards
     */
    public function boards() {
        $boards  = Board::all();
        return view('boards', compact("boards"));
    }

    /**
     * Store board
     */
    public function store(BoardCreateRequest $request) {
        $board = new Board();
        $board = $this->boardRepository->createOrUpdate($request, $board);
        return response()->json($board);
    }

    public function addItem(BoardCreateRequest $request) {

        return Board::create([
            'title' => $request->title,
            'sub_title' => $request->sub_title,
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
