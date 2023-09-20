@extends('admin.layouts.app')

@section('title', 'Editar Dúvida')

@section('header')
    <h4>Editar Dúvida: {{ $support->id }} </h4>
@endsection

@section('content')
    <x-alert/>

    <form action="{{ route('supports.editAction', $support->id) }}" method="POST">
        @method('PUT')
        @include('admin.supports.partials.form', [
            'support' => $support
        ])
    </form>
@endsection

