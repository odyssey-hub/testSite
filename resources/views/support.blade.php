@extends("Pub.layouts.layout")

@section('content')
    <h3>Запросить поддержку</h3>
    <form method="post" enctype="multipart/form-data" action="{{ route('support') }}">
        @csrf
        <div class="mb-3">
            <textarea name="desc" class="form-control" rows="3" placeholder="Опишите кратко проблему" required></textarea>
            @error('desc')
            <div class="alert alert-danger" style="width:50%; padding:5px;">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group row mt-3">
            <label for="log" class="col-md-4 col-form-label text-md-right">Приложите лог-файл</label>
            <div class="col-md-6">
                <input id="log" type="file" class="form-control" name="log" required>
            </div>
            @error('log')
            <div class="alert alert-danger" style="width:50%; padding:5px;">{{ $message }}</div>
            @enderror
        </div>
        <div class="contact_footer">
            <button class="btn btn-success" type="submit">ОК</button>
        </div>
    </form>
@endsection
