@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Puoi caricare fino a 4 foto</h3>
    <form action="{{ route('logged.image.store', $id) }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <input type="file" name="cover_url">
        </div>
        <div class="form-group">
        <label for="alt">Descrizione img</label>
        <input type="text" name="alt" id="alt">
        </div>

        <input type="submit" class="btn btn-primary" value="INVIA">

    </form>


</div>
@endsection
