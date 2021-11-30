@extends('admin.layouts.commons')

@section('content')
@include('admin.layouts.messages')

<div class="card shadow mb-4">
 <div class="card-header py-3 d-flex">
  <h2 class="m-0 font-weight-bold text-primary">TodoList</h6>

  {{Form::open(['url' => route('task.add.form',['id'=>$task->id])])}}
  <div class="form-group row">
   <div class="col">
    {{ Form::label('note_number', 'Memoを追加*:') }}
    {{ Form::text('note_number',$task->note_number,['class' => 'form-control']) }} 
   </div>
   
  
  </div>
   
  <button class="btn btn-space btn-primary paddingtb5px paddinglr20px" id="submit" type="submit">追加</button>
   
  {{Form::close()}}
  </div>

 
 
 

<div class=" container">  	
<br>
 
 {{Form::open(['url' => route('task.update',['id'=>$task->id])])}}
 
 {{ Form::hidden('note_number',$task->note_number) }} 
 

 {{$task}}
 
  
<div class="form-group row">
    <div class="col">
    {{ Form::label('task_details', 'タスク内容:') }}
    {{ Form::text('task_details',$task->task_details,['class' => 'form-control']) }} 
    </div>
</div>
 <hr>
 
 <div class="form-group row">
  <div class="col">
   {{ Form::label('task_name', 'タイトル*:') }}
   {{ Form::text('task_name',$task->task_name,['class' => 'form-control']) }} 
  </div>
  <div class="col">
   {{ Form::label('state', '状態*:') }}
   {{ Form::text('state',$task->state,['class' => 'form-control']) }} 
  </div>
 </div>
 <hr>
 
 <div class="form-group row">
  <div class="col">
   {{Form::label('deadline', '期限:') }}
   {{ Form::text('deadline',$task->deadline,['class' => 'form-control']) }} 
  </div>
  <div class="col">
   {{ Form::label('completion_date', '完了日:') }}
   {{ Form::text('completion_date',$task->completion_date,['class' => 'form-control']) }} 
  </div>
 </div>
 <hr>
 
 <details>
  <summary><h2>Memo</h2></summary>
  @php $i = 0; @endphp
  @foreach($task->notes as  $note)
  @php $i += 1; @endphp
   <div class="form-group row">
    <div class="col">
    {{ Form::label("note$i", "No$i") }}
    {{ Form::text("note$i",$note->note,['class' => 'form-control']) }} 
    </div>
   </div>
  @endforeach
  @php $a = $i +1; @endphp
  @for($j = 1; $j <= ($task->note_number - $i); $j++)
 
  <div class="form-group row">
   <div class="col">
   {{ Form::label("note$a", "No$a") }}
   {{ Form::text("note$a",old("note"),['class' => 'form-control']) }} 
   </div>
  </div>
  @php $a += 1; @endphp
  @endfor
 </details>
 <hr>
 
 <h2>check</h2>
  <div class="col">
  <label class="custom-control custom-checkbox custom-control-inline">
		<input type="hidden" name="active" value=0>
		@if($task->active == 1) 
		 <input class="custom-control-input" type="checkbox" name="active" value=1 checked >
		@else
		<input class="custom-control-input" type="checkbox" name="active" value=1 >
		@endif
		<span class="custom-control-label custom-control-color">完了</span>
	 </label>
	 <br>
	 
 {{ Form::submit('新規作成',['class' => 'btn btn btn-primary']) }}
 {{ Form::close() }}
  </div>
  <br>
  <br>
</div>
</div>

@endsection