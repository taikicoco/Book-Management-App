@extends('layouts.commons')

@section('content')
@include('layouts.messages')

<div class="card shadow mb-4">
 <div class="card-header py-3 d-flex">
  <h2 class="m-0 font-weight-bold text-primary">検索情報を登録</h6>
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
    {{ Form::label('titleKana', 'titleKana:') }}
    {{ Form::text('titleKana',$items[0]['titleKana'],['class' => 'form-control']) }} 
    </div>
</div>
<div class="form-group row">
    <div class="col">
    {{ Form::label('author', 'author:') }}
    {{ Form::text('author',$items[0]['author'],['class' => 'form-control']) }} 
    </div>
</div>
<div class="form-group row">
    <div class="col">
    {{ Form::label('authorKana', 'authorKana:') }}
    {{ Form::text('authorKana',$items[0]['authorKana'],['class' => 'form-control']) }} 
    </div>
</div>
<div class="form-group row">
    <div class="col">
    {{ Form::label('publisherName', 'publisherName:') }}
    {{ Form::text('publisherName',$items[0]['publisherName'],['class' => 'form-control']) }} 
    </div>
</div>
<div class="form-group row">
    <div class="col">
    {{ Form::label('salesDate', 'salesDate:') }}
    {{ Form::text('salesDate',$items[0]['salesDate'],['class' => 'form-control']) }} 
    </div>
</div>
<div class="form-group row">
    <div class="col">
    {{ Form::label('seriesName', 'seriesName:') }}
    {{ Form::text('seriesName',$items[0]['seriesName'],['class' => 'form-control']) }} 
    </div>
</div>
<div class="form-group row">
    <div class="col">
    {{ Form::label('subTitle', 'subTitle:') }}
    {{ Form::text('subTitle',$items[0]['subTitle'],['class' => 'form-control']) }} 
    </div>
</div>
<div class="form-group row">
    <div class="col">
    {{ Form::label('subTitleKana', 'subTitleKana:') }}
    {{ Form::text('subTitleKana',$items[0]['subTitleKana'],['class' => 'form-control']) }} 
    </div>
</div>
<div class="form-group row">
    <div class="col">
    {{ Form::label('itemPrice', 'itemPrice:') }}
    {{ Form::text('itemPrice',$items[0]['itemPrice'],['class' => 'form-control']) }} 
    </div>
</div>
<div class="form-group row">
    <div class="col">
    {{ Form::label('itemUrl', 'itemUrl:') }}
    {{ Form::text('itemUrl',$items[0]['itemUrl'],['class' => 'form-control']) }} 
    </div>
</div>
<div class="form-group row">
    <div class="col">
    {{ Form::label('isbn', 'isbn:') }}
    {{ Form::text('isbn',$items[0]['isbn'],['class' => 'form-control']) }} 
    </div>
</div>
<div class="form-group row">
    <div class="col">
    
    {{ Form::hidden('largeImageUrl',$items[0]['largeImageUrl'],['class' => 'form-control']) }} 
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