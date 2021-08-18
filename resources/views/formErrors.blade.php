@if($errors->any())
    <div class="alert alert-warning">
        @foreach($errors->all() as $error)
            - {{ $error }} <br/>
        @endforeach
    </div>
@endif
