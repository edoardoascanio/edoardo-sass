@if(count($errors->all()) > 0) 
    <div style="background-color: red">
        @foreach($errors->all() as $error)
            <p>{{$error}}</p>
        @endforeach
    </div>
@endif