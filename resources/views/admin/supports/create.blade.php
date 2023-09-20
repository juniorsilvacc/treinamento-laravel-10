@extends('admin.layouts.app')

@section('title', 'Nova Dúvida')

@section('header')
    <h4>Nova Dúvida</h4>
@endsection

@section('content')
    <x-alert/>

    <form action="{{ route('supports.createAction') }}" method="POST">
        @include('admin.supports.partials.form')
    </form>
@endsection
