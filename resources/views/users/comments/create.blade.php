@extends('layouts.master')

@section('title', 'Criar Novo Comentario')

@section('content')

<h1 class="text-2xl font-semibold leading-tigh py-2">Criar Comentario</h1>

    @include('components.validations-form')

    <form action="{{ route('comments.store', $user->id) }}" method="post">
        @include('components.formComments')
    </form>

@endsection
