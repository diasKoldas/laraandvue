@php
    $titleIsInvalid   = $errors->first('title')  ? "is-invalid": "";
@endphp

<div class="card" style="border: 3px solid white;">
    <div class="card-header bg-white">
        <h5 class="mb-1">Редактирование отдела</h5>
    </div>
    <div class="card-body">
        <form method="post" action="/department-edit">
            {{csrf_field()}}
            <div class="form-group">
                <label>Название отдела</label>
                @if($errors->first('title'))
                    <input name="title" type="text" class="form-control {{$titleIsInvalid}}" value="{{old('title')}}" style="background: rgba(255, 255, 255, 0.58);">
                @else
                    <input name="title" type="text" class="form-control" value="{{$title}}" style="background: rgba(255, 255, 255, 0.58);">
                @endif
                @error('title')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
                <input name="id" type="hidden" value="{{$id}}">
            </div>
            <button type="submit" class="btn btn-warning mt-2">Редактировать</button>
        </form>
    </div>
</div>
