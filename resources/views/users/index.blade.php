<h1>Listagem de Usuarios</h1>

<ul>
    @foreach($users as $user)
        <li>
            {{$user->name}} - {{$user->email}} | <a href="{{ route('users.show', ['id' => $user->id])}}">Detalhe</a>
        </li>
    @endforeach
</ul>
