@extends('admin.layouts.app')

@section('title', 'Nova Dúvida')

@section('header')
    <h1>Nova Dúvida</h1>
@endsection

@section('content')
    <x-alert/>

    <form action="{{ route('supports.createAction') }}" method="POST">
        @include('admin.supports.partials.form')
    </form>
@endsection
