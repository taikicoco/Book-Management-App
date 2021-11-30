@extends('layouts.commons')
@section('content')
@include('layouts.messages')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h2 class="m-0 font-weight-bold text-primary">Library</h2>
    </div>
    <br>
    
    <div class="container text-center">
        <div class="col-md-6 offset-md-3">
        <div class="row">
           
            <div class="col">
                <div><a href="{{ route('library.register.add') }}" class="btn btn btn-primary">本を登録</a></div>
            </div>
            <div class="col">
                <div><a href="{{ route('library.list') }}" class="btn btn btn-primary">すべての本</a></div>
            </div>
            <div class="col">
                <div><a href="{{ route('library.my') }}" class="btn btn btn-primary">借りてる本</a></div>
            </div>
            
    
            <br>
                <br><br>
            </div>
        </div>
    </div>
</div>
@endsection