@extends('layouts.app')

@section('content')
      <h1>{{$board->title}}</h1>

      @if(!Auth::guest())
            <a href="/boards/{{$board->id}}/edit" class="btn btn-lg btn-primary">Éditer</a>

            {!!Form::open(['action' => ['BoardsController@destroy', $board->id], 'method' => 'POST'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Supprimer', ['class' => 'btn btn-lg btn-danger'])}}
            {!!Form::close()!!}

            <a href="/lists/create/{{$board->id}}" class="btn btn-lg btn-success">Ajouter une liste</a>
      @endif

      <hr/>
      <small>Mise à jour le {{$board->updated_at}}</small>

      <div class="row">
            @if(count($lists) >= 1)
                  @foreach($lists as $list)
                  <div class="card" style="width: 18rem;margin:0 0 1rem 1rem;">
                        <div class="card-body">
                              <h3 class="card-title">{{$list->title}}</h3>
                        </div>
                        <div class="card-body">
                              <?php $cards = App\Card::orderBy('created_at', 'desc')->where('list_id', $list->id)->where('item_id', NULL)->paginate(10); ?>
                              @foreach($cards as $card)
                                    <div class="card">
                                          {{$card->title}}
                                          <?php $items = App\Card::orderBy('created_at', 'desc')->where('item_id', $list->id)->paginate(10); ?>
                                          @foreach($items as $item)
                                                <div class="card">
                                                      {{$item->title}}
                                                </div>
                                          @endforeach
                                          <a href="/items/create/{{$card->id}}" class="card-link">Créer un item</a>
                                    </div>
                              @endforeach
                              <a href="/cards/create/{{$list->id}}" class="card-link">Créer une carte</a>
                        </div>
                  </div>
                  @endforeach
            @else
                  <p>Aucune liste dans ce tableau</p>
            @endif
      </div>
@endsection