@extends('layouts.commons')
@section('content')
@include('layouts.messages')

<div class="card shadow mb-4">
 <div class="card-header py-3 d-flex">
  <h2 class="m-0 font-weight-bold text-primary">Book</h6>
 </div>
 <div class=" container">  	
 <br>



<div class="form-group row">
    <div class="col">
    {{ Form::label('name', 'title*:') }}
    <h2>{{$book->title}}</h3>
    </div>
</div>
 <hr>
 
 <div class="form-group row">
  <div class="col">
   {{Form::label('author', '著者:') }}
   <h2>{{$book->author}}</h2>
  </div>
 </div>
 
 <hr>
 
 <div class="form-group row">
  <div class="col">
   {{Form::label('state', '貸出状態:') }}
   @if($book->book_flag == 1)
   <h2>貸出中</h2>
   @else
   <h2>貸出可能</h2>
   @endif
  </div>
 </div>
 <hr>
 
 @if($book->book_flag == 1)
 <div class="form-group row">
  <div class="col">
   {{Form::label('borrow_acount', '借りてる人:') }}
   <h2>{{$book->borrow_acount}}</h2>
  </div>
 </div>
 <hr>
 @endif
 
 <details>
  <summary><h2>貸出履歴</h2></summary>
  @foreach($book->history as $history)
   <div class="form-group row">
   <div class="col">
    <h2>{{$history->borrow_acount}}</h2>
   </div>
   <div class="col">
    <h2>{{$history->created_at}}</h2>
   </div>
  </div>
  <hr>
  @endforeach
 </details>
 

 
 
 @php 
 $borrow_user = $book -> borrow_acount;
 $login_user = session('admin')->email; 
 @endphp
 <br>

 @if($book->book_flag == 0)
 {{Form::open(['url' => route('library.borrow',['id'=>$book->id])])}}
 {{ Form::submit('借りる',['class' => 'btn btn btn-primary']) }}
 {{ Form::close() }}
 <br>
 @elseif($borrow_user == $login_user)
 {{Form::open(['url' => route('library.return',['id'=>$book->id])])}}
 {{ Form::submit('返却',['class' => 'btn btn btn-primary']) }}
 {{ Form::close() }}
 <br>
 @endif
 
 <div><a href="{{ route('library.list') }}" class="btn btn btn-primary">一覧へ</a></div>
 
 </div>
  <br>
  <br>
</div>
</div>


@endsection