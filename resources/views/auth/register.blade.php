
<!DOCTYPE html>
<html lang="ja">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Book Management </title>
     <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

    
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
   
     <!-- Custom fonts for this template-->
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
    
   
  

</head>

<body class="bg-gradient-primary">

    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="card o-hidden border-0 shadow-lg my-5 col-6">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <!--<div class="col-lg-6">-->
                        <div class="p-5">
                            @include('layouts.messages')
                           
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">SignUp</h1>
                            </div>
                            <!--<form class="user">-->
                            
                            {!! Form::open(['route' => 'signup.post']) !!}
                            
                            <div class="form-group">
                                {!! Form::label('key', '共通キー') !!}
                                {!! Form::text('key','', ['class' => 'form-control']) !!}
                            </div>
                        
                            <div class="form-group">
                                {!! Form::label('name', '名前') !!}
                                {!! Form::text('name','', ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('email', '学籍番号') !!}
                                {!! Form::text('email','', ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('password', 'Password') !!}
                                {!! Form::password('password', ['class' => 'form-control']) !!}
                            </div>
                
                            <div class="form-group">
                                {!! Form::label('password_confirmation', 'Confirmation') !!}
                                {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                            </div>
                            <br>
                                {!! Form::submit('Sign up', ['class' => 'btn btn-primary btn-block']) !!}
                            <br>
                            {!! Form::close() !!}
                            <br>
                            
                            
                        </div>
                    <!--</div>-->
                </div>
            </div>
        </div>
    </div>
</body>
 