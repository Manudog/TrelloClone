@extends('layouts.app')

@section('content')
      <h1>Créer une liste {{request('id')}}</h1>
      {!!Form::open(['action' => 'ListsController@store', 'method' => 'POST'])!!}
      <div class="form-group">
            {{Form::label('title', 'Titre')}}
            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Titre'])}}
      </div>
      {{Form::hidden('board_id', $id)}}
      {{Form::submit('Valider', ['class' => 'btn btn-lg btn-primary'])}}
      {!!Form::close()!!}
@stop