@extends('layouts.app')

@section('content')

@foreach($accomodations as $accomodation)

<h3>{{ $accomodation->title }}</h3>
    
@endforeach

@endsection