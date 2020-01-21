@php
    $firstNameIsInvalid   = $errors->first('first_name')  ? "is-invalid": "";
    $LastNameIsInvalid    = $errors->first('last_name')   ? "is-invalid": "";
    $departmentsIsInvalid = $errors->first('departments') ? "is-invalid": "";
@endphp

<div class="card" style="border: 3px solid white;">
    <div class="card-header bg-white">
        <h5 class="mb-1">Добавление нового сотрудника</h5>
    </div>
    <div class="card-body">
        <form method="post" action="/user-add">
            {{csrf_field()}}
            <div class="form-group">
                <label>Имя </label>
                <input name="first_name" type="text" class="form-control {{$firstNameIsInvalid}}" value="{{old('first_name')}}" style="background: rgba(255, 255, 255, 0.58);">
                @error('first_name')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Фамилия</label>
                <input name="last_name" type="text" class="form-control {{$LastNameIsInvalid}}" value="{{old('last_name')}}" style="background: rgba(255, 255, 255, 0.58);">
                @error('last_name')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Отчество</label>
                <input name="patronymic" type="text" class="form-control" value="{{old('patronymic')}}" style="background: rgba(255, 255, 255, 0.58);">
            </div>
            <label>Пол</label>
            <div class="form-group">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="male" value="1" {{old('gender') != 2 ? 'checked' : ''}}>
                    <label class="form-check-label" for="male">
                        Мужской
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="female" value="2" {{old('gender') == 2 ? 'checked' : ''}}>
                    <label class="form-check-label" for="female">
                        Женский
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label>Заработная плата</label>
                <input name="wage" type="number" class="form-control" value="{{old('wage')}}" style="background: rgba(255, 255, 255, 0.58);">
            </div>

            <div class="form-group">
                <label>Отделы</label>
                <select name="departments[]"  multiple="multiple" class="custom-select mr-sm-2 {{$departmentsIsInvalid}}">
                    @foreach($departments as $department)
                        @if(count(old('departments')) > 0)
                            <option {{collect(old('departments'))->search($department->id) !== false ? 'selected' : ''}} value="{{$department->id}}">{{$department->title}}</option>
                        @else
                            <option value="{{$department->id}}">{{$department->title}}</option>
                        @endif                    @endforeach
                </select>
                @error('departments')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary mt-2">Добавить</button>
        </form>
    </div>
</div>
