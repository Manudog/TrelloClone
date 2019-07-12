<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Liste;

class ListesController extends Controller
{
    /**
     * Store a new list
     */
    public function store() {

        request()->validate([
            'title' => 'required',
        ]);
        
        return Liste::create([
            'board_id' => 1,
            'title' => request('title'),
        ]);

    }
}
