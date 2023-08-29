@extends('layouts.master')

@section('title', 'Editar Usuario')

@section('content')

<div class="bg-gray-100 h-screen flex flex-col justify-center items-center">
    <div class="max-w-md mx-auto p-8 bg-white shadow-md rounded-md">
        <h1 class="text-4xl font-bold mb-4">Erro 404</h1>
        <p class="text-lg mb-4">A página que você está procurando não foi encontrada.</p>
        <a href="{{ route('users.index') }}" class="text-blue-500 hover:underline">Voltar para a página inicial</a>
    </div>
</div>
@endsection
