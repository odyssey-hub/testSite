<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Allison&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/register.js') }}"></script>


    <title>Document</title>
</head>
<body>

<header></header>
<div class="auth" style="margin-right: 1.5rem;  text-align: end; ">
    @if(auth()->check())
        <a>{{auth()->user()->name}}</a>
        <a  style="text-decoration: none; color: #706549 !important;" href="logout">Выйти</a>
    @else
        <a style="text-decoration: none; color: #706549 !important;" href="/login">Авторизация</a> /
        <a style="text-decoration: none; color: #706549 !important;" href="/registration">Регистрация</a>
    @endif
</div>
<div class="navigation">
    <h3 class="navigation_uppertxt text-center">newride</h3>
    <h2 class="navigation_maintxt text-center">Registration</h2>
</div>



<div class="container mt-3">
    <form class="form-horizontal" role="form" method="POST" action="{{ route('user.registration') }}"  enctype="multipart/form-data">
        @csrf
        <div class="form-group mt-2">
            <label for="name" class="col-sm-3 control-label"  >Имя*</label>
            <div class="col-sm-9">
                <input name="name" type="text" id="name" placeholder="Имя" class="form-control" minlength="6" maxlength="20"  autofocus required>
            </div>
            @error('name')
            <div class="alert alert-danger" style="width:50%; padding:5px;">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mt-2">
            <label for="email" class="col-sm-3 control-label">Email* </label>
            <div class="col-sm-9">
                <input type="email" id="email" placeholder="Email" class="form-control" name= "email"  required>
            </div>
            @error('email')
            <div class="alert alert-danger" style="width:50%; padding:5px;">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mt-2">
            <label for="password" class="col-sm-3 control-label">Пароль*</label>
            <div class="col-sm-9">
                <input name="password" type="password" id="password" placeholder="Пароль" class="form-control" minlength="6" required>
            </div>
            @error('password')
            <div class="alert alert-danger" style="width:50%; padding:5px;">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mt-2">
            <label for="confirm_password" class="col-sm-3 control-label">Повторите пароль*</label>
            <div class="col-sm-9">
                <input type="password" id="confirm_password" placeholder="Повторите пароль" class="form-control" minlength="6" required>
                <span id='message'></span>
            </div>
        </div>
        <div class="form-group row mt-3">
            <label for="avatar" class="col-md-4 col-form-label text-md-right">Аватарка</label>
            <div class="col-md-6">
                <input id="avatar" type="file" class="form-control" name="avatar">
            </div>
            @error('avatar')
            <div class="alert alert-danger" style="width:50%; padding:5px;">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mt-2">
            <div class="col-sm-9 col-sm-offset-3">
                <span class="help-block">*Важные поля</span>
            </div>
        </div>
        <button type="submit" class="btn btn-warning btn-block mt-2">Зарегистрироваться</button>
    </form> <!-- /form -->
</div> <!-- ./container -->



<!--
<div class="container">
    <div class="auth-content">
        <form class="col-3 offset-4 border rounded" method="post" action="{{ route('user.registration') }}">
            @csrf
            <div class="form-group">
                <label for="username">Name</label>
                <input type="email" class="form-control" id="username"  placeholder="Enter name">
            </div>
            <div class="form-group mt-2">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                @error('email')
                <div class="alert alert-danger"> {{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mt-2">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Password">
                @error('password')
                <div class="alert alert-danger"> {{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mt-2">
                <label for="password2">Confirm Password</label>
                <input type="password" class="form-control" id="password2" placeholder="Confirm Password">
                @error('password')
                <div class="alert alert-danger"> {{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
-->


@include("Pub.layouts.parts.footer")

</body>
</html>
