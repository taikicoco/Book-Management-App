@if(filled($errors))
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            @foreach ($errors->all() as $error)
            <h4 class="m-0 font-weight-bold text-danger">{{$error}}</h4>
            
            @endforeach
        </div>
    </div>
@endif

@if (isset($messages))
<div class="card shadow mb-4">
    <div class="card-header py-3">
        @foreach($messages as $message)
        <h4 class="m-0 font-weight-bold text-dark">{{$message}}</h4>
        @endforeach
    </div>
</div>
@endif