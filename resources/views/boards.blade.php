@extends('layouts.app')

@section('content')
      <h1>Tableaux</h1>
      <hr/>
      <boards :data-boards="{{$boards}}"></boards>
@stop