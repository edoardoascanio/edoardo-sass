@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('logged.create') }}">crea</a>
    <h1>ciao</h1>
    <h1>{{Auth::user()->name}}</h1>

    @foreach($accomodations as $accomodation)
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">{{ $accomodation->title }}</h5>
            <p class="card-text">{{ $accomodation->description }}</p>
            <div class="row">
            <div>
            
            @foreach($accomodation->services as $service)
            <span class="badge bg-secondary">{{ $service->title }}</span>
            @endforeach
            </div>
            </div>

            <a href="{{ route('logged.show', ['id' => $accomodation->id]) }}" class="card-link btn btn-primary">Viasualizza</a><br>
            <a href="{{ route('logged.edit', $accomodation->id) }}" class="card-link btn btn-primary" >Modifica</a><br>
            @if(count($accomodation->messages) > 0)
            <a href="{{ route('message.index', $accomodation->id) }}" class="btn btn-primary">Hai {{ count($accomodation->messages) }} messaggi</a><br>
            @else
            <p>Non hai nessun messaggio</p>
            @endif
            <form action="{{ route('logged.destroy', $accomodation->id) }}" method="post">
            @csrf
            @method('delete')
            
            <input type="submit" value="Elimina">
            </form>
            <p>Visualizzazioni: {{ count($accomodation->views) }}</p>


        </div>
    </div>


    @endforeach
</div>
@endsection
