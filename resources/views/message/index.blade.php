@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">


        @foreach($messages as $message)
        <div class="card" style="width: 18rem;">
            <div class="card-body">

                <p>messaggio da: {{ $message->email_sender }}</p>
                <a href="{{ route('message.show', $message->id) }}">visualizza messaggio</a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
