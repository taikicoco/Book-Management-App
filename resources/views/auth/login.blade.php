
<!DOCTYPE html>
<html lang="ja">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Kawasaki </title>
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
                                <h1 class="h4 text-gray-900 mb-4">ログイン</h1>
                            </div>
                            <!--<form class="user">-->
                            {{Form::open(['url' => route('login.post',['class' => 'user'])])}}
                                <div class="form-group">
                                   {{ Form::label('',) }}
                                   {{ Form::text('email','',['class' => 'form-control','placeholder'=>"アカウント名"]) }}
                                
                                    {{ Form::label('',) }}
                                    {{ Form::text('password','',['class' => 'form-control','placeholder'=>"Password"]) }}
                                </div>
                                
                                <!--<a href="index.html" class="btn btn-primary btn-user btn-block">Login  </a>-->
                                
                                <button class="btn btn-primary btn-user btn-block" id="submit" type="submit">Login</button>
                            <!--</form>-->
                            {{Form::close()}}
                            <br>
                            <div><a href="{{ route('signup.get') }}" class="btn btn-primary btn-user btn-block">SignUP</a></div>
                            
                        </div>
                    <!--</div>-->
                </div>
            </div>
        </div>
    </div>
</body>
 