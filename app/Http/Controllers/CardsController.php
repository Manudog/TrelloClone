<?php

namespace App\Http\Controllers;

use App\Http\Requests\CardCreateRequest;
use App\Repositories\CardRepository;
use Illuminate\Http\Request;
use App\Models\Card;

class CardsController extends Controller
{

    /**
     * @var CardRepository
     */
    private $cardRepository;

    public function __construct(CardRepository $cardRepository) {
        $this->cardRepository = $cardRepository;
    }

    /**
     * Store a new list
     */
    public function store(CardCreateRequest $request) {
        $card = new Card();
        $card = $this->cardRepository->createOrUpdate($request, $card);
//        return Card::create([
//            'list_id' => $request->dataList,
//            'title' => $request->title,
//        ]);
        return response()->json($card);
//        return $card;
    }

    public function addItem(CardCreateRequest $request) {

        return Card::create([
            'list_id' => $request->dataList,
            'item_id' => $request->dataCard,
            'title' => $request->title,
        ]);

    }

}
