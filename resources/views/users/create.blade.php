@extends('layouts.master')

@section('title', 'Criar Novo Usuario')

@section('content')

<h1 class="text-2xl font-semibold leading-tigh py-2">Criar Usuario</h1>

    @include('components.validations-form')

    <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
        @include('components.form')
    </form>

@endsection
