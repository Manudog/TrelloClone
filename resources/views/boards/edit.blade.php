@extends('layouts.app')

@section('content')
      <h1>Éditer un tableau</h1>
      {!!Form::open(['action' => ['BoardsController@update', $board->id], 'method' => 'POST'])!!}
      <div class="form-group">
            {{Form::label('title', 'Titre')}}
            {{Form::text('title', $board->title, ['class' => 'form-control', 'placeholder' => 'Titre'])}}
      </div>
      <div class="form-group">
            {{Form::label('sub_title', 'Sous-Titre')}}
            {{Form::text('sub_title', $board->sub_title, ['class' => 'form-control', 'placeholder' => 'Sous-Titre'])}}
      </div>
      {{Form::hidden('_method', 'PUT')}}
      {{Form::submit('Valider', ['class' => 'btn btn-lg btn-primary'])}}
      {!!Form::close()!!}
@endsection