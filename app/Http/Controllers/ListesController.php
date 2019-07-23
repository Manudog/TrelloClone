<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Liste;

class ListesController extends Controller
{
    /**
     * Store a new list
     */
    public function store() {
        
        request()->validate([
            'title' => 'required',
        ]);
        
        // \Debugbar::info(request('dataBoard'));

        return Liste::create([
            'board_id' => request('dataBoard'),
            'title' => request('title'),
        ]);

    }
}
