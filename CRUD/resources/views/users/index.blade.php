@extends('main')

@section('content')
    <a href="{{ route('users.create') }}" class="button-create">Criar novo usuário</a>
    <hr>

    <h2 class="user-list-title">Usuários do sistema</h2>

    <ul class="user-list">
        @foreach ($users as $user)
            <li class="user-list-item">
                <span class="user-name">{{ $user->name }}</span>


                <div class="user-actions">

                    <a href="{{ route('users.edit', $user) }}" class="action-link edit-link">Editar</a>


                    <form action="{{ route('users.destroy', $user) }}" method="POST" class="delete-form">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="action-link delete-link" onclick="return confirm('Tem certeza que deseja deletar este usuário?')">Deletar</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>

@endsection
