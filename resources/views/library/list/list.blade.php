@extends('layouts.commons')
@section('content')
@include('layouts.messages')

<div class="card shadow mb-4">
  <div class="card-header py-3 d-flex justify-content-between">
    <h2 class="m-0 font-weight-bold text-primary">BookList</h6>
    
    <!-- Topbar Search -->
    {{Form::open(['url' => route('library.search')])}}
      <div class="input-group mb-3">
        <div class="input-group-text">
          {{ Form::label('on', '貸出中',['class' => 'form-check-label']) }}
          {{ Form::checkbox('on','on',['class' => 'form-check-label'])}} 
        </div>
        <div class="input-group-text">
          {{ Form::label('off', '貸出可能',['class' => 'form-check-label']) }}
          {{ Form::checkbox('off','off',['class' => 'form-check-label'])}} 
        </div>
      <input type="text" class="form-control" name="key_word"value="" aria-label="Text input with checkbox">
      {{ Form::submit('□',['class' => 'btn btn btn-primary fas fa-search fa-sm']) }}
      </div>
    {{Form::close()}}
  </div>
    
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
              <th >ID</th>
              <th >Title</th>
              <th>著者</th>
              <th>状態</th>
              
              <th></th>
          </tr>
        </thead>
        
  @php $count=0;@endphp
  @foreach($books as $book)
       
        <tbody>
          @if($book->book_flag ==1)
          <tr class="table-secondary">
          @else
          <tr>
          @endif
            <td scope="col" >{{$book->id}}</th>
            <td >{{$book->title}}</td>
             <td>{{$book->author}}</td>
            @if($book->book_flag ==0)
            <td>貸出可能</td>
            @else
            <td>貸出中</td>
            @endif
            <td align="center"><a href="{{ route('library.detail',['id'=>$book->id]) }}" class="btn btn-sm btn-space btn-primary margin5px">詳細</a></td>
          </tr>
        <tbody>
  @endforeach
      </table>
      @if(!filled($books))
    <div class="card-header py-3 d-flex">
      <h2 class="m-0 font-weight-bold text-primary">対象の書籍はありません </h6>
    </div>
    @endif
    </div>
    <!--{$tasks->links() }-->
  </div>
</div>

@endsection