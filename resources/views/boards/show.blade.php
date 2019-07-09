@extends('layouts.app')

@section('content')
      <h1>{{$board->title}}</h1>

      @if(!Auth::guest())
            <a href="/boards/{{$board->id}}/edit" class="btn btn-lg btn-primary">Éditer</a>

            {!!Form::open(['action' => ['BoardsController@destroy', $board->id], 'method' => 'POST'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Supprimer', ['class' => 'btn btn-lg btn-danger'])}}
            {!!Form::close()!!}
      @endif

      <hr/>
      <small>Mise à jour le {{$board->updated_at}}</small>
@endsection