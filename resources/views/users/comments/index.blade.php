@extends('layouts.master')

@section('title', 'Listagem de Comentarios')

@section('content')
    <h1 class="text-2xl font-semibold leading-tigh py-2">Listagem de Comentarios
        <a href="{{ route('comments.create', $user->id)}}" class="bg-blue-900 rounded-full text-white px-4 py-2 text-sm">
            Cria Comentario
        </a>
    </h1>

    <form action="{{ route('users.index') }}" method="GET" class="py-5">
        <input type="text" name="search" placeholder="Perquisar"
        class="md:w-1/6 bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500">
        <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">Pesquisar</button>
    </form>

    <table class="min-w-full leading-normal shadow-md rounded-lg overflow-hidden">
        <thead>
            <tr>
              <th
                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider"
              >
                Conteudo
              </th>
              <th
                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider"
              >
                Visivel
              </th>
            </tr>
        </thead>
            <tbody>
                @foreach($comments as $comment)
                    <tr>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            {{ $comment->comment }}
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $comment->visible ? 'Sim' : 'Não' }}</td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <a href="{{ route('users.edit', $user->id) }}" class="bg-green-200 rounded-full py-2 px-6">Editar</a>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <a href="{{ route('users.show', $user->id) }}" class="bg-red-200 rounded-full py-2 px-6">Excluir</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
    </table>
@endsection
