@extends("Pub.layouts.layout")


@section('content')
    <h3>Contact Us</h3>
    <form method="post" >
        <div class="row mb-3">
            <div class="col-lg-6">
                <input type="text" class="form-control"  placeholder="Имя">
            </div>
            <div class="col-lg-6">
                <input type="text" class="form-control"  placeholder="Фамилия">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-lg-6">
                <input type="email" class="form-control"  placeholder="Email">
            </div>
            <div class="col-lg-6">
                <input type="tel" class="form-control"  placeholder="Телефон">
            </div>
        </div>
        <div class="mb-3">
            <textarea class="form-control" rows="3" placeholder="Сообщение"></textarea>
        </div>
        <div class="contact_footer">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Подписаться на рассылку
                </label>
            </div>
            <button class="btn btn-success" type="submit">ОК</button>
        </div>

    </form>
@endsection
