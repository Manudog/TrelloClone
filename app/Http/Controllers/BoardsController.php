<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Board;
use App\Liste;

class BoardsController extends Controller
{

    public function __construct(){
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $boards = Board::orderBy('created_at', 'desc')->paginate(10);
        return view('boards.index')->with('boards', $boards);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('boards.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required',
            'sub_title' => 'required',
        ]);
        
        $board = new Board;
        $board->user_id = auth()->user()->id;
        $board->title = $request->input('title');
        $board->sub_title = $request->input('sub_title');
        $board->save();

        return redirect('/boards')->with('success', 'Tableau ajouté');

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

        $lists = Liste::orderBy('created_at', 'desc')->where('board_id', $board->id)->paginate(10);
        return view('boards.show')->with('board', $board)->with('lists', $lists);
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
