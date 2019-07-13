@extends('layouts.app')

@section('content')
      <h1>{{$board->title}} <small class="text-muted" style="font-size:12px;">Mise à jour le {{$board->updated_at->format('d/m/Y')}}</small></h1>

      {{-- @if(!Auth::guest())
            <a href="/boards/{{$board->id}}/edit" class="btn btn-lg btn-primary">Éditer</a>

            {!!Form::open(['action' => ['BoardsController@destroy', $board->id], 'method' => 'POST'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Supprimer', ['class' => 'btn btn-lg btn-danger'])}}
            {!!Form::close()!!}

            <a href="/lists/create/{{$board->id}}" class="btn btn-lg btn-success">Ajouter une liste</a>
      @endif --}}

      {{-- <hr/>
      <small>Mise à jour le {{$board->updated_at}}</small> --}}

      <lists :data-lists="{{$lists}}" :data-cards="{{$cards}}" :data-board="{{$board->id}}"></lists>

@stop