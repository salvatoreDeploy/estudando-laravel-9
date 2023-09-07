@extends('layouts.master')

@section('title', 'Editar Comentario')

@section('content')

<h1 class="text-2xl font-semibold leading-tigh py-2">Editar Comentario - {{ $comment->id }}</h1>

    @include('components.validations-form')

    <form action="{{ route('users.update', $comment->id) }}" method="post">
        @method('PUT')
        @include('components.formComments')
    </form>

@endsection
