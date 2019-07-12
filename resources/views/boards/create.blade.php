@extends('layouts.app')

@section('content')
      <h1>Créer un tableau</h1>
      {!!Form::open(['action' => 'BoardsController@store', 'method' => 'POST'])!!}
      <div class="form-group">
            {{Form::label('title', 'Titre')}}
            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Titre'])}}
      </div>
      <div class="form-group">
            {{Form::label('sub_title', 'Sous-Titre')}}
            {{Form::text('sub_title', '', ['class' => 'form-control', 'placeholder' => 'Sous-Titre'])}}
      </div>
      {{Form::submit('Valider', ['class' => 'btn btn-lg btn-primary'])}}
      {!!Form::close()!!}
@stop