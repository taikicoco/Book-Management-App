@extends('admin.layouts.commons')

@section('content')
@include('admin.layouts.messages')

<div class="card shadow mb-4">
 <div class="card-header py-3 d-flex">
  <h2 class="m-0 font-weight-bold text-primary">TodoList</h6>

  {{Form::open(['url' => route('task.add.form',['id'=>0])])}}
  <div class="form-group row">
   <div class="col">
    {{ Form::label('note_number', 'Memoを追加*:') }}
    {{ Form::text('note_number',$note_number,['class' => 'form-control']) }} 
   </div>
   
  
  </div>
   
  <button class="btn btn-space btn-primary paddingtb5px paddinglr20px" id="submit" type="submit">追加</button>
   
  {{Form::close()}}
  </div>

 
 
 

<div class=" container">  	
<br>
 
 {{Form::open(['url' => route('task.create',['id'=>0])])}}
 
 {{ Form::hidden('note_number',$note_number) }} 
 

 
 
  
<div class="form-group row">
    <div class="col">
    {{ Form::label('task_details', 'タスク内容:') }}
    {{ Form::text('task_details',old('task_details'),['class' => 'form-control']) }} 
    </div>
</div>
 <hr>
 
 <div class="form-group row">
  <div class="col">
   {{ Form::label('task_name', 'タイトル*:') }}
   {{ Form::text('task_name',old('task_name'),['class' => 'form-control']) }} 
  </div>
  <div class="col">
   {{ Form::label('state', '状態*:') }}
   {{ Form::text('state',old('state'),['class' => 'form-control']) }} 
  </div>
 </div>
 <hr>
 
 <div class="form-group row">
  <div class="col">
   {{Form::label('deadline', '期限:') }}
   {{ Form::text('deadline',old('deadline'),['class' => 'form-control']) }} 
  </div>
  <div class="col">
   {{ Form::label('completion_date', '完了日:') }}
   {{ Form::text('completion_date',old('completion_date'),['class' => 'form-control']) }} 
  </div>
 </div>
 <hr>
 
 <details>
    <summary><h2>Memo</h2></summary>
    @for ($i = 1;$i <= $note_number; $i++)
        <div class="form-group row">
            <div class="col">
            {{ Form::label("note$i", "No$i") }}
            {{ Form::text("note$i",old("note"),['class' => 'form-control']) }} 
            </div>
        </div>
    @endfor
 </details>
 <hr>
 
 <h2>check</h2>
  <div class="col">
  <label class="custom-control custom-checkbox custom-control-inline">
   <input type="hidden" name="active" value=0>
   <input class="custom-control-input" type="checkbox" name="active" value=1>
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