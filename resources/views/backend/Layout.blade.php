<!doctype html>
<head>


    <meta charset="utf-8">

    <title>MVC Todo</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/bootstrap.min.css') }}"> -->

    <link href="starter-template.css" rel="stylesheet">

    <style>
        body {
            padding-top: 5rem;
        }
        .starter-template {
            padding: 3rem 1.5rem;
            text-align: center;
        }
    </style>
</head>

<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">MVC Todo</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
       
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{url('admin/tasks') }}">Home <span class="sr-only">(current)</span></a>
            </li>
            @if(Auth::user()->level == 1 || Auth::user()->level == 2 )
            <li class="active"><a class="nav-link" href="{{ url('admin/users') }}">Quản lý user</a></li>
            @endif

           
            <li style="margin-left:935px;" class="active"><a  class="nav-link" href="#">Xin chào {{ Auth::user()->email }}</a></li>
            <li class="active"><a class="nav-link" href="{{ url('logout') }}">Đăng xuất</a></li>
        </ul>

    </div>
</nav>

<main role="main" class="container">

    <div class="starter-template ">

    @yield("do-du-lieu-vao-layout")

    </div>

</main>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>

</body>
</html>
