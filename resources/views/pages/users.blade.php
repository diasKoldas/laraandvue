@extends('layouts.default')

@section('menu')
    @include('menu.default')
@endsection


@section('content_8')
    <div class="mb-5">
        @include('user.table')
    </div>
@endsection

@section('content_4')
    <div class="mb-5">
        @include('user.form_add')
    </div>
@endsection
