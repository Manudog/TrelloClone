@extends('layouts.app')

@section('content')
      <h1>{{$board->title}}</h1>

      @if(!Auth::guest())
            <a href="/boards/{{$board->id}}/edit" class="btn btn-lg btn-primary">Éditer</a>

            {!!Form::open(['action' => ['BoardsController@destroy', $board->id], 'method' => 'POST'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Supprimer', ['class' => 'btn btn-lg btn-danger'])}}
            {!!Form::close()!!}

            <a href="/lists/create/{{$board->id}}     " class="btn btn-lg btn-success">Ajouter une liste</a>
      @endif

      <hr/>
      <small>Mise à jour le {{$board->updated_at}}</small>

      @if(count($lists) >= 1)
            @foreach($lists as $list)
            <div class="card" style="width: 18rem;margin:0 0 1rem 1rem;">
                  <div class="card-body">
                        <h3 class="card-title">{{$list->title}}</h3>
                  </div>
            </div>
            @endforeach
      @else
            <p>Aucune liste dans ce tableau</p>
      @endif
@endsection