@extends('layouts.app')

@section('content')
<div class="container dash-container">
    <div class="card dash-card">
        <h3>Benvenuto {{Auth::user()->name}}</h3>
        <a href="{{ route('logged.create') }}"> <i class="fa fa-plus-square-o"></i> <strong>Crea</strong></a>
    </div>



    @foreach($accomodations as $accomodation)
    <div class="card accomodation-card">
        <div class="card-body">
            <h3 class="card-title">{{ $accomodation->title }}</h3>
            <div class="row">
                <img class="card-img col-lg-6" src="{{ $accomodation->placeholder ? asset('storage/' . $accomodation->placeholder) : asset('placeholder/house-placeholder.jpeg') }}" alt="..." class="img-thumbnail">

                <p class="card-text col-lg-6">{{ $accomodation->description }}</p>
                <div class="row">
                    <div>

                        @foreach($accomodation->services as $service)
                        <span class="badge bg-secondary">{{ $service->title }}</span>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="row accomodation-btn">
                        <a href="{{ route('logged.show', ['id' => $accomodation->id]) }}" class="card-link btn btn-primary col-lg-3">Visualizza</a><br>
                        <a href="{{ route('logged.edit', $accomodation->id) }}" class="card-link btn btn-primary col-lg-3">Modifica</a><br>
                        <a href="{{ route('logged.image.create', $accomodation->id) }}" class="card-link btn btn-primary col-lg-3">Aggiungi foto</a><br>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="row message">
                        <div class="col-lg-8">
                            @if(count($accomodation->messages) > 0)
                            <a href="{{ route('message.index', $accomodation->id) }}" class="btn btn-primary">Hai {{ count($accomodation->messages) }} Messaggi</a><br>
                            @else
                            <p>Non hai nessun messaggio</p>
                            @endif
                        </div>

                        <div class="col-la-2">
                            <form action="{{ route('logged.destroy', $accomodation->id) }}" method="post">
                                @csrf
                                @method('delete')

                                <input class="delete-btn btn btn-primary" type="submit" value="Elimina">
                            </form>
                        </div>

                        <div class="col-lg-2">
                            <button class="applica-btn btn btn-primary" type="submit">Applica 
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="visua">
                <p>Visualizzazioni: {{ count($accomodation->views) }}</p>

                <form action="{{ route('logged.visibility', $accomodation->id) }}" method="post">
                    @csrf
                    @method('PATCH')

                    <div class="row">
                        <div class="col-lg-10">
                            <label for="customSwitch1">Visibile
                                <input name="visibility" type="radio" value="1" id="true" {{ $accomodation->visibility == true ? 'checked' : "" }}>
                            </label>

                            <label for="customSwitch1">Non visibile
                                <input name="visibility" type="radio" value="0" id="false" {{ $accomodation->visibility == false ? 'checked' : "" }}>
                            </label>
                        </div>

                        <div class="col-lg-2">

                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>


    @endforeach
</div>
@endsection
