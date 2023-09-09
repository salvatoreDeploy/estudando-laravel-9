@extends('layouts.master')

@section('title', 'Editar Usuario')

@section('content')

<h1 class="text-2xl font-semibold leading-tigh py-2">Editar Usuario - {{ $user->name }}</h1>

    @include('components.validations-form')

    <form action="{{ route('users.update', $user->id) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @include('components.form')
    </form>

@endsection
