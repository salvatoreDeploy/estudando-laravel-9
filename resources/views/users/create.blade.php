@extends('layouts.master')

@section('title', 'Criar Novo de Usuario')

@section('content')

<h1>Criar Usuarios</h1>

    <form action="{{ route('users.store') }}" method="post">
        @csrf

        <input type="text" name="name" placeholder="Digite seu nome">
        <input type="email" name="email" placeholder="Digite seu E-mail">
        <input type="password" name="password" placeholder="Digite sua senha">
        <button type="submit">Enviar</button>
    </form>

@endsection
