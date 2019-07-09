@extends('layouts.app')

@section('content')
      <h1>Tableaux</h1>
      <hr/>
      @if(!Auth::guest())
            <a href="boards/create" class="btn btn-lg btn-primary mb-4">Créer un tableau</a>
      @endif
      <div class="row">
            @if(count($boards) >= 1)
                  @foreach($boards as $board)
                  <div class="card" style="width: 18rem;margin:0 0 1rem 1rem;">
                        <div class="card-body">
                              <h3 class="card-title">{{$board->title}}</h3>
                              <h6 class="card-subtitle mb-2 text-muted">{{$board->sub_title}} <!--{{$board->created_at->format('d/m/Y')}}--></h6>
                        </div>
                        <hr/>
                        <div class="card-body">
                              <a href="/boards/{{$board->id}}" class="card-link">Voir</a>
                              @if(!Auth::guest())
                                    <a href="/boards/{{$board->id}}/edit" class="card-link">Éditer</a>
                              @endif
                        </div>
                  </div>
                  @endforeach
            @else
                  <p>Aucun tableau actuellement</p>
            @endif
      </div>
@endsection