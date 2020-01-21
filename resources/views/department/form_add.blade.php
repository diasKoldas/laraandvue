@php
    $titleIsInvalid   = $errors->first('title')  ? "is-invalid": "";
@endphp

<div class="card" style="border: 3px solid white;">
    <div class="card-header bg-white">
        <h5 class="mb-1">Добавление нового отдела</h5>
    </div>
    <div class="card-body">
        <form method="post" action="/department-add">
            {{csrf_field()}}
            <div class="form-group">
                <label>Название отдела</label>
                <input name="title" type="text" class="form-control {{$titleIsInvalid}}" value="{{old('title')}}" style="background: rgba(255, 255, 255, 0.58);">
                @error('title')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary mt-2">Добавить</button>
        </form>
    </div>
</div>
