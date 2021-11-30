@extends('admin.layouts.commons')
@section('content')
@include('admin.layouts.messages')

<div class="card shadow mb-4">
  <div class="card-header py-3 d-flex justify-content-between">
    <h2 class="m-0 font-weight-bold text-primary">TodoList</h6>
    <!-- Topbar Search -->
    {{Form::open(['url' => route('admin.index.sort')])}}
      <div class="input-group mb-3">
        <div class="input-group-text">
          {{ Form::label('on', 'ON',['class' => 'form-check-label']) }}
          {{ Form::checkbox('on','on',['class' => 'form-check-label'])}} 
        </div>
        <div class="input-group-text">
          {{ Form::label('off', 'OFF',['class' => 'form-check-label']) }}
          {{ Form::checkbox('off','off',['class' => 'form-check-label'])}} 
        </div>
      <input type="text" class="form-control" name="key_word"value="" aria-label="Text input with checkbox">
      {{ Form::submit('□',['class' => 'btn btn btn-primary fas fa-search fa-sm']) }}
      </div>
    {{Form::close()}}
    
    
    <div><a href="{{ route('task.add',['id'=>0]) }}" class="btn btn-sm btn-primary">TASK追加</a></div>
  </div>
    
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
              <th >ID</th>
              <th >タスク名</th>
              <th>状態</th>
              <th>期限</th>
              <th >アクティブ</th>
              <th></th>
          </tr>
        </thead>
        
  @php $count=0;@endphp
  @foreach($tasks as $task)
  @php $count+=1;@endphp
       
        <tbody>
          @if($task->active!=1)
          <tr class="table-secondary">
          @else
          <tr>
          @endif
            <td scope="col" >{{$task->id}}</th>
            <td >{{$task->task_name}}</td>
            <td>{{$task->state}}</td>
            <td>{{$task->deadline}}</td>
          @if($task->active==1)
            <td>ON</td>
          @else
            <td>OFF</td>
          @endif
            <td align="center"><a href="{{ route('task.edit',['id'=>$task->id]) }}" class="btn btn-sm btn-space btn-primary margin5px">編集</a></td>
          </tr>
        <tbody>
  @endforeach
      </table>
    </div>
    <!--{$tasks->links() }-->
  </div>
</div>

@endsection