@extends('layouts.commons')


@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h2 class="m-0 font-weight-bold text-primary">ユーザー登録</h2>
    </div>
    
    <div class="container text-center">
    
        <div class="row">
            <div class="col">
            <br>
                {!! Form::open(['route' => 'login.post']) !!}
                <div class="form-group">
                    {!! Form::label('email', 'ユーザー名') !!}
                    {!! Form::text('email',  ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('password', 'Password') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>
                <br>
                {!! Form::submit('ログイン', ['class' => 'btn btn-primary btn-block']) !!}
                {!! Form::close() !!}
                <br><br>
            </div>
        </div>
    </div>
</div>
@endsection