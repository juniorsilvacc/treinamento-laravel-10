@extends('admin.layouts.app')

@section('title', 'Detalhes')

@section('header')
    <h4>Detalhes da dúvida: {{$support->id}} </h4>
@endsection

@section('content')
    @include('admin.supports.partials.list')
@endsection



