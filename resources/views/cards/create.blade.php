@extends('layouts.app')

@section('content')
      <h1>Créer une carte {{request('id')}}</h1>
      {!!Form::open(['action' => 'CardsController@store', 'method' => 'POST'])!!}
      <div class="form-group">
            {{Form::label('title', 'Titre')}}
            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Titre'])}}
      </div>
      <div class="form-group">
            {{Form::label('description', 'Description')}}
            {{Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Description'])}}
      </div>
      {{Form::hidden('list_id', $id)}}
      {{Form::submit('Valider', ['class' => 'btn btn-lg btn-primary'])}}
      {!!Form::close()!!}
@endsection