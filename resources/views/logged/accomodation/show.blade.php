
@extends('layouts.app')

@section('content')
<h1>show privato</h1>
<div class="container">
    <h1>{{ $accomodation->title }}</h1>
    <h2>{{ $accomodation->description }}</h2>
    <h2>{{ $accomodation->city }} - {{ $accomodation->streat_name }} - {{ $accomodation->zip }}</h2>
    <a href="{{ route('logged.edit', $accomodation->id) }}" class="card-link btn btn-primary">Modifica</a><br>
    {{-- <form action="{{ route('logged.update', $accomodation->id) }}" method="post">
        @csrf
        @method('PATCH')
        <button type="submit">
            <div class="custom-control custom-switch">
                <input name="visibility"  type="checkbox" class="custom-control-input" id="customSwitch1">
                <label class="custom-control-label" for="customSwitch1">Toggle this switch element</label>
            </div>
        </button>
    </form> --}}
    <form action="{{ route('logged.destroy', $accomodation->id) }}" method="post">
        @csrf
        @method('delete')

        <input type="submit" value="Elimina">
    </form>
    <p>Visualizzazioni: {{ count($accomodation->views) }}</p>
    @if(count($accomodation->messages) > 0)
    @foreach($messages as $message)
    <p>{{ $message->object_email }}</p>
    <a href="{{ route('message.show', $message->id) }}" class="card-link btn btn-primary">Visualizza messaggio</a><br>

    @endforeach
    @else
    <p>Non hai nessun messaggio</p>
    @endif


</div>
@endsection
