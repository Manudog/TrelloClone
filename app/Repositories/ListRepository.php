<?php
/**
 * Created by Thomas Lemoine.
 * Twitter: @Dysey_Qanga
 * Date: 23/07/2019
 * Time: 11:37
 */

namespace App\Repositories;

use App\Models\Liste;
use App\Http\Requests\ListCreateRequest;

class ListRepository
{
      public function createOrUpdate(ListCreateRequest $request, Liste $list) {
            $list->title = $request->title;
            $list->board_id = $request->dataBoard;

            $list->save();

            return $list;
      }
}