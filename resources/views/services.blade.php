@extends("Pub.layouts.layout")


@section('content')
    <h3>New Services</h3>
    <div class="card mt-2">
        <div class="card-header">
            Услуга 1
        </div>
        <div class="card-body">
            <h5 class="card-title">Обучение Angular</h5>
            <p class="card-text">В данном курсе вы подробно изучите Angular.js</p>
            <a href="#">Подробнее</a>
        </div>
    </div>

    <div class="card mt-2">
        <div class="card-header">
            Услуга 2
        </div>
        <div class="card-body">
            <h5 class="card-title">Обучение Vue</h5>
            <p class="card-text">В данном курсе вы подробно изучите Vue.js</p>
            <a href="#">Подробнее</a>
        </div>
    </div>

    @foreach($services as $service)
        <div class="card mt-2">
            <div class="card-header">
                {{ $service->header}}
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $service->name}}</h5>
                <p class="card-text">{{$service->desc}}</p>
                <a href="#">Подробнее</a>
            </div>
        </div>
    @endforeach
@endsection
