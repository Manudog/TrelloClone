<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Card;

class CardsController extends Controller
{
    /**
     * Store a new list
     */
    public function store() {
        
        request()->validate([
            'title' => 'required',
        ]);

        return Card::create([
            'list_id' => request('dataList'),
            'title' => request('title'),
        ]);

    }
}
