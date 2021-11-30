@extends('admin.layouts.commons')
@section('content')
@include('admin.layouts.messages')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h2 class="m-0 font-weight-bold text-primary">QRcode</h2>
    </div>
    <br>
    
    <div class="container text-center">
        <div class="col-md-6 offset-md-3">
        <div class="row">
            <br>
                {{ Form::open(['route' => 'qr.download']) }}
    
                <div class="form-group">
                    {{ Form::label('qr_url', 'URL') }}
                    {{ Form::text('qr_url', '',['class' => 'form-control']) }}
                </div>
                <br>
                    {{ Form::submit('Download', ['class' => 'btn btn-primary btn-block']) }}
                <br>
                {{ Form::close() }}
                <br><br>
            </div>
        </div>
    </div>
</div>
@endsection