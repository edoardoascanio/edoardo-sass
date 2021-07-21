@extends('layouts.app')

@section('content')

@foreach($accomodations as $accomodation)

<h3>{{ $accomodation->title }}</h3>
<a href="{{ route('guest.show', $accomodation->id) }}">dettagli</a>
<a href="{{ route('logged.edit', $accomodation->id) }}">modifica</a>
    
@endforeach

@endsection