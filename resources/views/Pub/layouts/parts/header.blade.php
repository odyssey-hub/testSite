
<header></header>
<div class="auth" style="margin-right: 1.5rem;  text-align: end; ">
    @if(auth()->check())
        <a>Вы вошли как {{auth()->user()->name}}</a> /
        <a  style="text-decoration: none; color: #706549 !important;" href="logout">Выйти</a>
    @else
        <a style="text-decoration: none; color: #706549 !important;" href="/login">Авторизация</a> /
        <a style="text-decoration: none; color: #706549 !important;" href="/registration">Регистрация</a>
    @endif
</div>
<div class="navigation">
    <h3 class="navigation_uppertxt text-center">newride</h3>
    <h2 class="navigation_maintxt text-center">Web Development</h2>
    <ul class="nav justify-content-center">
        @if(auth()->check())
            <li class="nav-item">
                <a class="nav-link {{ request()->is('private') ? 'active' : '' }}" aria-current="page" href="{{ url('private') }}">user</a>
            </li>
        @endif
        <li class="nav-item">
            <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" aria-current="page" href="{{ url('/') }}">home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('clients') ? 'active' : '' }}" href="{{ url('clients') }}">our clients</a>
        </li>
        @if(auth()->check())
            <li class="nav-item">
                <a class="nav-link {{ request()->is('support') ? 'active' : '' }}" href="{{url('support')}}">support</a>
            </li>
         @endif
        <li class="nav-item">
            <a class="nav-link {{ request()->is('services') ? 'active' : '' }}" href="{{url('services')}}">new services</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('solutions') ? 'active' : '' }}" href="{{url('solutions')}}">solutions</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">testimonials</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('contact') ? 'active' : '' }}" href="{{url('contact')}}">contact</a>
        </li>
    </ul>
</div>
