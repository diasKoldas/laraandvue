@extends('layouts.default')

@section('menu')
    @include('menu.default')
@endsection

@section('content')
    @include('user.table_departments')
@endsection
