@extends('layouts.commons')
@section('content')
@include('layouts.messages')

<div class="card shadow mb-4">
 <div class="card-header py-3 d-flex">
  <h2 class="m-0 font-weight-bold text-primary">search</h6>
 </div>

<div class=" container">  	
<br>
 
 {{Form::open(['url' => route('library.register.search')])}}

<div class="form-group row">
    <div class="col">
    {{ Form::label('isbn', 'ISBN*:') }}
    {{ Form::text('isbn',old('isbn'),['class' => 'form-control']) }} 
    </div>
</div>
 <hr>
 
   <br>
 {{ Form::submit('検索',['class' => 'btn btn btn-primary']) }}
 {{ Form::close() }}
  </div>
  <br>
  <br>
</div>
</div>

@endsection
