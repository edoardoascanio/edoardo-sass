@if(count($errors->all()) > 0) 
    <div style="color: red">
        @foreach($errors->all() as $error)
            <p>{{$error}}</p>
        @endforeach
    </div>
@endif