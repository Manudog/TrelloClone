<?php
/**
 * Created by Thomas Lemoine.
 * Twitter: @Dysey_Qanga
 * Date: 23/07/2019
 * Time: 11:37
 */

namespace App\Repositories;

use App\Models\Board;
use App\Http\Requests\BoardCreateRequest;

class BoardRepository
{
      public function createOrUpdate(BoardCreateRequest $request, Board $board) {
            $board->user_id = auth()->user()->id;
            $board->title = $request->title;
            $board->sub_title = $request->sub_title;

            $board->save();

            return $board;
      }
}