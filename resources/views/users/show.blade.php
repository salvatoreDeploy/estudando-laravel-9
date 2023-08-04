@extends('layouts.master')

@section('title', 'Detalhes do Usuario')

@section('content')
    <h1>Detalhe do Usuario {{ $user->name }}</h1>

    <ul>
        <li>{{ $user->name }}</li>
        <li>{{ $user->email }}</li>
        <li>{{ $user->created_at }}</li>
    </ul>
@endsection
