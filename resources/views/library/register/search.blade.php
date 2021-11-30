@extends('layouts.commons')

@section('content')
@include('layouts.messages')

<div class="card shadow mb-4">
 <div class="card-header py-3 d-flex">
  <h2 class="m-0 font-weight-bold text-primary">register</h6>
 </div>

<div class=" container">  	
<br>
 
 {{Form::open(['url' => route('rakuten.register')])}}

<div class="form-group row">
    <div class="col">
    {{ Form::label('title', 'title:') }}
    {{ Form::text('title',$items[0]['title'],['class' => 'form-control']) }} 
    </div>
</div>
<div class="form-group row">
    <div class="col">
    {{ Form::label('author', 'author:') }}
    {{ Form::text('author',$items[0]['author'],['class' => 'form-control']) }} 
    </div>
</div>
 <hr>
 
   <br>
 {{ Form::submit('登録',['class' => 'btn btn btn-primary']) }}
 {{ Form::close() }}
  </div>
  <br>
  <br>
</div>
</div>

@endsection