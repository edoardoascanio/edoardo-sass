@extends('layouts.app')

@section('content')
<div class="container">
    @include('layouts.components.error')

    <p>* tutti i campi sono obbligatori</p>

    <form action="{{ route("logged.store") }}" method="post" enctype="multipart/form-data">

        @csrf
        <div class="form-group">
            <label for="customSwitch1">Visibile
                <input name="visibility" type="radio" value="1" id="true">
            </label>

            <label for="customSwitch1">Non visibile
                <input name="visibility" type="radio" value="0" id="false" checked>
            </label>
        </div>
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
            <label for="check_in">check in</label>
            <select name="check_in" id="check_in">
                <option value="" seletced> Scegli orario </option>
                @for($i = 0; $i < 24; $i++) <option value="{{ $i }}"> {{ $i > 9 ? $i : '0' . $i }}:00 </option>
                    @endfor
            </select>
        </div>

        <div class="form-group">
            <label for="check_out">check out</label>
            <select name="check_out" id="check_out">
                <option value="" seletced> Scegli orario </option>
                @for($i = 0; $i < 24; $i++) <option value="{{ $i }}"> {{ $i }}:00 </option>
                    @endfor
            </select>
        </div>

        {{-- AGGIUNGERE PLACEHOLDER IMG --}}
        <div class="form-group">
            <label for="placeholder">Carica img di copertina</label>
            <input type="file" name="placeholder" id="placeholder" accept=".jpg, .png, .svg, .jpeg">
        </div>

        {{-- services  --}}
        <div class="form-group">
            @foreach($services as $service)
            <label for="{{ $service->title }}">
                <input type="checkbox" name="services[]" value="{{ $service->id }}" id="{{ $service->title }}">
                {{ $service->title }}
            </label>
            @endforeach
        </div>

        <add-position>
            <add-position>



    </form>
</div>


@endsection
