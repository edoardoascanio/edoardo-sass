@extends('layouts.app')

@section('content')
<div class="container">
    @foreach($accomodations as $accomodation)
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">{{ $accomodation->title }}</h5>
            <p class="card-text">{{ $accomodation->description }}</p>
            <a href="{{ route('guest.show', ['id' => $accomodation->id]) }}" class="card-link">Viasualizza</a>
        </div>
    </div>




    @endforeach
</div>
@endsection
