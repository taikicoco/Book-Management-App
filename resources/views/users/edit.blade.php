@extends('layouts.commons')
@section('content')
@include('layouts.messages')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h2 class="m-0 font-weight-bold text-primary">ユーザー詳細/編集</h2>
    </div>
    <br>
    
    <div calss="text-center">
        <div class="col-md-6 offset-md-3">
            
            {{Form::open(['url' => route('users.update',['id'=>$user->id])])}}
            <div class="form-group ">
                <div class="col">
                    {{ Form::label('name', 'ユーザー名:')}}
                    {{ Form::text('name',$user->name,['class' => 'form-control']) }} 
                </div>
                <br>
                <div class="col">
                    {{ Form::label('password', 'password:') }}
                    {{ Form::text('password','',['class' => 'form-control']) }} 
                </div>
                <br>
                <div class="col">
                        {!! Form::label('password_confirmation', 'Confirmation') !!}
                        {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                </div>
                <br>
                <div class="col">
                    
                    <label class="custom-control custom-checkbox custom-control-inline">
                        <input type="hidden" name="state" value=0>
                        <input class="custom-control-input" type="checkbox" name="state" value = "DELETE">
                        <span class="custom-control-label custom-control-color">削除</span>
                    </label>
                </div>
                {!! Form::submit('更新',['class' => 'btn btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection