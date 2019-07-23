<?php
/**
 * Created by Thomas Lemoine.
 * Twitter: @Dysey_Qanga
 * Date: 23/07/2019
 * Time: 11:37
 */

namespace App\Repositories;


use App\Models\Card;
use App\Http\Requests\CardCreateRequest;

class CardRepository
{
    public function createOrUpdate(CardCreateRequest $request, Card $card) {
        $card->title = $request->title;
        $card->list_id = $request->dataList;
        $card->item_id = (isset($request->dataCard) || !is_null($request->dataCard)) ? $request->dataCard : null;

        $card->save();

        return $card;
    }
}