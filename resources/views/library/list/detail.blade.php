@extends('layouts.commons')
@section('content')
@include('layouts.messages')

<div class="card shadow mb-6">
 <div class="card-header py-3 d-flex">
  <h2 class="m-0 font-weight-bold text-primary">書籍情報</h6>
 </div>
 <div class=" container">  	
  <br>
  <div class="row">
   <div class="col-lg-3 mb-4">
    
    <img src="{{$book->largeImageUrl}}">
   </div>
   <div class="col-lg-6 mb-4">
    <b><h4>{{$book->title}}</h4></b>
    <h6>{{$book->titleKana}}</h6>
    <p>著；{{$book->author}}</p>
    <details>
    <summary><h3>詳細情報</h3><hr></summary>
    
    <h6>出版；{{$book->publisherName}}</h6>
    <h6>発売；{{$book->salesDate}}</h6>
    <h6>シリーズ；{{$book->seriesName}}</h6>
    <h6>サブタイトル；{{$book->subTitle}}</h6>
    <h6>価格；{{$book->itemPrice}}</h6>
    <h6>ISBN；{{$book->isbn}}</h6>
    <hr>
    </details>
    <h3>貸出状態；@if($book->book_flag == 1)貸出中；{{$book->borrow_acount}}が利用中@else貸出可能@endif</h3>
   </div>
   
  </div>
 </div>
 <div class=" container">  
 <details>
  <summary><h3>貸出履歴</h3><hr></summary>
  <div class="table-responsive">
   <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
     <tr>
      <th >アカウント名</th>
      <th >貸出開始日時</th>
     </tr>
    </thead>
    @foreach($book->history as $history)
    <tbody>
     <tr>
      <td scope="col" >{{$history->borrow_acount}}</td>
      <td>{{$history->created_at->format('Y-m-d')}}</td>
    </tbody>
    @endforeach
  </table>
 </details>
 <br>
 </div>
</div>


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