@extends('layouts.app')

@section('content')
      <h1>Tableaux</h1>
      <hr/>
      <board-form :data-boards="{{$boards}}" :data-user_id="{{$user_id}}"></board-form>
@stop