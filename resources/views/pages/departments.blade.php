@extends('layouts.default')

@if($customException ?? false)
    <div class="alert alert-warning text-center" role="alert">
        {{$customException}}
    </div>
@endif

@section('menu')
    @include('menu.default')
@endsection

@section('content_8')
    @include('department.table')
@endsection

@section('content_4')
    @include('department.form_add')
@endsection
