@extends('layouts.master')

@section('title', 'Criar Novo de Usuario')

@section('content')

<h1>Criar Usuarios</h1>

    @if($errors->any())
        <ul class="errors">
            @foreach ($errors->all() as $error)
                <li class="error">{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('users.store') }}" method="post">
        @csrf

        <input type="text" name="name" placeholder="Digite seu nome" value="{{ old('name')}}">
        <input type="email" name="email" placeholder="Digite seu E-mail" value="{{ old('email') }}">
        <input type="password" name="password" placeholder="Digite sua senha">
        <button type="submit">Enviar</button>
    </form>

@endsection
