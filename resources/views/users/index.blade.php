@extends('layouts.master')

@section('title', 'Listagem de Usuario')

@section('content')
    <h1>Listagem de Usuarios</h1>

    <ul>
        @foreach($users as $user)
            <li>
                {{$user->name}} - {{$user->email}} |
                <a href="{{ route('users.show', ['id' => $user->id])}}">Detalhe</a> |
                <a href="{{ route('users.create')}}">Cria Usuario</a>
            </li>
        @endforeach
    </ul>
@endsection
