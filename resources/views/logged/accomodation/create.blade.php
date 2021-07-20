@extends('layouts.app')

@section('content')

@include('layouts.components.error')


<form action="{{ route("logged.store") }}" method="post" enctype="multipart/form-data">

    @csrf

    <div class="form-group">
        <label for="title">Titolo</label>
        <input type="text" id="title" name="title" class="form-control">
    </div>

    <div class="form-group">
        <label for="description">Descrizione</label>
        <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
    </div>

    <div class="form-group">
        <label for="number_rooms">Numero di Stanze</label>
        <input type="number" name="number_rooms" id="number_rooms" cols="30" rows="10" class="form-control" placeholder="max: 20">
    </div>

    <div class="form-group">
        <label for="number_bathrooms">Numero di Bagni</label>
        <input type="number" name="number_bathrooms" id="number_bathrooms" cols="30" rows="10" class="form-control" placeholder="max: 20">
    </div>

    <div class="form-group">
        <label for="number_beds">Numero di Letti</label>
        <input type="number" name="number_beds" id="number_beds" cols="30" rows="10" class="form-control" placeholder="max: 20">
    </div>

    <div class="form-group">
        <label for="square_mts">Metri quadrati</label>
        <input type="number" name="square_mts" id="square_mts" cols="30" rows="10" class="form-control">
    </div>

    <div class="form-group">
        <label for="price_per_night">Prezzo per Notte</label>
        <input type="number" name="price_per_night" id="price_per_night" cols="30" rows="10" class="form-control">
    </div>

    <div class="form-group">
        <label for="country">Paese</label>
        <input type="text" name="country" id="country" cols="30" rows="10" class="form-control">
    </div>

    <div class="form-group">
        <label for="city">Citta'</label>
        <input type="text" name="city" id="city" cols="30" rows="10" class="form-control">
    </div>

    <div class="form-group">
        <label for="zip">CAP</label>
        <input type="text" name="zip" id="zip" cols="30" rows="10" class="form-control">
    </div>

    <div class="form-group">
        <label for="street_name">Indirizzo</label>
        <input type="text" name="street_name" id="street_name" cols="30" rows="10" class="form-control">
    </div>

    <div class="form-group">
        <label for="building_number">Numero Civico</label>
        <input type="number" name="building_number" id="building_number" cols="30" rows="10" class="form-control">
    </div>

    {{-- AGGIUNGERE PLACEHOLDER IMG --}}

    {{-- services  --}}
    @foreach($services as $service)
    <label for="{{ $service->title }}">
        <input type="checkbox" name="services[]" value="{{ $service->id }}" id="{{ $service->title }}">
        {{ $service->title }}
    </label>
    @endforeach

    <div class="form-group">
        <input type="submit" value="Crea" class="form-control btn btn-success text-capitalize">
    </div>

</form>

{{-- @foreach($services as $service)

<h1>{{ $service->title }}</h1>

@endforeach --}}

@endsection