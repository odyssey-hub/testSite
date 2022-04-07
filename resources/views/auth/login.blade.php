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
        <a>{{auth()->user()->name}} {{auth()->user()->imag}}</a>
        <a  style="text-decoration: none; color: #706549 !important;" href="logout">Выйти</a>
    @else
        <a style="text-decoration: none; color: #706549 !important;" href="/login">Авторизация</a> /
        <a style="text-decoration: none; color: #706549 !important;" href="/registration">Регистрация</a>
    @endif
</div>
<div class="navigation">
    <h3 class="navigation_uppertxt text-center">newride</h3>
    <h2 class="navigation_maintxt text-center">Авторизация</h2>
</div>



<div class="container mt-3">
    <form class="form-horizontal" role="form" method="POST" action="{{ route('user.login') }}">
        @csrf
        <div class="form-group mt-2">
            <label for="email" class="col-sm-3 control-label">Email </label>
            <div class="col-sm-9">
                <input type="email" id="email" placeholder="Email" class="form-control" name= "email"  required>
            </div>
            @error('email')
            <div class="alert alert-danger" style="width:50%; padding:5px;">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mt-2">
            <label for="password" class="col-sm-3 control-label">Пароль</label>
            <div class="col-sm-9">
                <input name="password" type="password" id="password" placeholder="Пароль" class="form-control" minlength="6" required>
            </div>
            @error('password')
            <div class="alert alert-danger" style="width:50%; padding:5px;">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-warning btn-block mt-2">Войти</button>
    </form> <!-- /form -->
</div> <!-- ./container -->

<footer id="footer" style="margin-top: 13rem">
    <div class="container">
        <div class="footer_inner">
            <div class="footer_info">
                <div class="footer_copyright">
                    &copy; 2021 - The Odyssey
                </div>
                <div class="footer_social">
                    <a class="footer_link" href="#"><img src="{{ asset('img/linkedin_icon.png') }}" alt=""></a>
                    <a class="footer_link" href="#"><img src="{{ asset('img/twitter_icon.png') }}" alt=""></a>
                    <a class="footer_link" href="#"><img src="{{ asset('img/facebook_icon.png') }}" alt=""></a>
                    <a class="footer_link" href="#"><img src="{{ asset('img/instagram_icon.png') }}" alt=""></a>
                </div>
            </div>
            <div class="footer_nav">
                <a href="#" class="footer_nav_link">Work</a>
                <a href="#" class="footer_nav_link">About me</a>
                <a href="#" class="footer_nav_link">Blog</a>
                <a href="#" class="footer_nav_link">Contact</a>
            </div>
        </div>
    </div>
</footer>

</body>
</html>
