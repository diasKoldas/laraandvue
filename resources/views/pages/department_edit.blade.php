@extends('layouts.default')

@section('menu')
    @include('menu.default')
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-6 mb-5">
            @include('department.form_edit')
        </div>
    </div>
@endsection
