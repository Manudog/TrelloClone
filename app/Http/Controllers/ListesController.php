<?php

namespace App\Http\Controllers;

use App\Http\Requests\ListCreateRequest;
use App\Repositories\ListRepository;
use Illuminate\Http\Request;
use App\Models\Liste;

class ListesController extends Controller
{

    /**
     * @var ListRepository
     */
    private $listRepository;

    public function __construct(ListRepository $listRepository) {
        $this->listRepository = $listRepository;
    }

    public function store(ListCreateRequest $request) {
        $list = new Liste();
        $list = $this->listRepository->createOrUpdate($request, $list);
        return response()->json($list);
    }

    public function addItem(ListCreateRequest $request) {

        return Liste::create([
            'board_id' => $request->dataBoard,
            'title' => $request->title,
        ]);

    }
}
