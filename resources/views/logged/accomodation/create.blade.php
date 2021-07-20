@extends('layouts.app')

@section('content')

ciao

@foreach($services as $service)

<h1>{{ $service->title }}</h1>
    
@endforeach

@endsection