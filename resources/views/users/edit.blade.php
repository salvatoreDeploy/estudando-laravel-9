@extends('layouts.master')

@section('title', 'Editar Usuario')

@section('content')

<h1>Editar Usuario - {{ $user->name }}</h1>

    @if($errors->any())
        <ul class="errors">
            @foreach ($errors->all() as $error)
                <li class="error">{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('users.update', $user->id) }}" method="post">
        @csrf
        @method('PUT')
        <input type="text" name="name" placeholder="Digite seu nome" value="{{ $user->name }}">
        <input type="email" name="email" placeholder="Digite seu E-mail" value="{{ $user->email }}">
        <input type="password" name="password" placeholder="Digite sua senha">
        <button type="submit">Editar</button>
    </form>

@endsection
