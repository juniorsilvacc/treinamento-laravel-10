@extends('admin.layouts.app')

@section('title', 'Fórum')

@section('header')
    @include('admin.supports.partials.header', [
        'total' => $supports->total(),
    ])
@endsection

@section('content')
    @include('admin.supports.partials.content')

    <x-pagination
    :paginator="$supports"
    :appends="$filters"
    />
@endsection

