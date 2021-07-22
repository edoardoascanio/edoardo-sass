@extends('layouts.app')

@section('content')
<div class="container">
<div class="card" style="width: 18rem;">
        <div class="card-body">
    <ul>
        <li>{{ $message->object_email }}</li>
        <li>{{ $message->content }}</li>
        <li>{{ $message->email_sender }}</li>


    </ul>

</div>
</div>
</div>
@endsection
