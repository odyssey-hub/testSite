@extends("Pub.layouts.layout")

@section('content')
    <h3>Страница пользователя</h3>
    <div class="row">
        <div class="col-lg-4"><img src="{{asset('storage/avatars/'.auth()->user()->avatar)}}" width="200" height="200"></div>
        <div class="col-lg-6 col-lg-offset-2">
            <p>ID: {{auth()->user()->id}}</p>
            <p>Имя: {{auth()->user()->name}}</p>
            <p>Email: {{auth()->user()->email}}</p>
            <p>Создан: {{auth()->user()->created_at}}</p>
        </div>
    </div>
@endsection
