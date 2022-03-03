@extends('layouts.commons')


@section('content')
@include('layouts.messages')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">ユーザーリスト</h6>
        <!--<div><a href="{{-- route('signup.get') --}}" class="btn btn-sm btn-primary">新規作成</a></div>-->
        
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>ユーザー名</th>
                        <th>アカウント名</th>
                        {{--<th>登録日</th>--}}
                        <th></th>
                    </tr>
                </thead>
                 @foreach($users as $user)
                  <tbody>
                  <tr>
                    <th scope="col">{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    {{--<td>{{$user->created_at}}</td>--}}
                    <td align="center"><a href="{{ route('users.edit',['id'=>$user->id]) }}" class="btn btn-sm btn-space btn-primary margin5px">編集</a></td>
                  </tr>
                  <tbody>
                @endforeach
                
            </table>
        </div>
    </div>
</div>

@endsection