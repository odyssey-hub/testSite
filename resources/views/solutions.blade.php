




@extends("Pub.layouts.layout")

@section('content')

    <style>
        label, input, textarea { display:block; }
        input.text { margin-bottom:12px; width:95%; padding: .4em; }
        fieldset { padding:0; border:0; margin-top:25px; }
        h1 { font-size: 1.2em; margin: .6em 0; }
        div#users-contain { width: 350px; margin: 20px 0; }
        div#users-contain table { margin: 1em 0; border-collapse: collapse; width: 100%; }
        div#users-contain table td, div#users-contain table th { border: 1px solid #eee; padding: .6em 10px; text-align: left; }
        .ui-dialog .ui-state-error { padding: .3em; }
        .validateTips { border: 1px solid transparent; padding: 0.3em; }
    </style>
    <script
        src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
        integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
        crossorigin="anonymous"></script>
    <link href="https://code.jquery.com/ui/1.12.1/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14"></script>

    <div class="row">
        <div class="col-lg-4"><h3>My Solutions</h3></div>
        @if(auth()->check())
            <div class="offset-lg-4 col-lg-4" style="text-align: end">
                <i class="fa fa-plus-circle" aria-hidden="true" style="font-size:2rem; color:darkgreen;" id="addItem"></i>
            </div>

        @endif
    </div>

    <div id="dialog-form" title="Добавить новый элемент">
        <p class="validateTips">Все поля должны быть заполнены</p>
        <form>
            <fieldset>
                <label for="header">Заголовок</label>
                <input type="text" name="header" id="header" class="text ui-widget-content ui-corner-all" required>
                <label for="content">Содержимое</label>
                <textarea name="content" id="content" cols="30" class="text ui-widget-content ui-corner-all" required></textarea>


                <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
            </fieldset>
        </form>
    </div>


    <div id="dialog-form2" title="Отредактировать элемент">
        <p class="validateTips">Все поля должны быть заполнены</p>
        <form>
            <fieldset>
                <label for="header">Заголовок</label>
                <input type="text" name="header" id="edit-header" class="text ui-widget-content ui-corner-all" required>
                <label for="content">Содержимое</label>
                <textarea name="content" id="edit-content" cols="30" class="text ui-widget-content ui-corner-all" required></textarea>


                <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
            </fieldset>
        </form>
    </div>

    <div id="solutions">
        @foreach($solutions as $solution)
            <div class="card mt-2" data-id="{{$solution->id}}">
                <h5 class="card-header w-100">Решение №{{$solution->id}}</h5>
                <div class="card-body">
                    <h5 class="card-title">{{$solution->header}}</h5>
                    <p class="card-text">{{$solution->content}}</p>
                    @auth
                    <button type="button" class="btn btn-primary btnEdit" data-id="{{$solution->id}}"
                            data-header="{{$solution->header}}" data-content="{{$solution->content}}">Редактировать</button>
                    <button type="button" class="btn btn-danger btnDelete" data-id="{{$solution->id}}">Удалить</button>
                    @endauth
                </div>
            </div>
        @endforeach
    </div>

    <script src="{{asset('js/ajax.js')}}"></script>


@endsection


