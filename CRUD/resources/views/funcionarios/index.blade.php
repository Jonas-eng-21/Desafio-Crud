<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Funcionários') }}
        </h2>
    </x-slot>

    <a href="{{ route('funcionarios.create') }}" class="button-create">Cadastrar novo funcionário</a>
    <hr>

    <h2 class="user-list-title">Funcionários Cadastrados</h2>

    <ul class="user-list">
        @foreach ($funcionarios as $funcionario)
            <li class="user-list-item">
                <span class="user-name">{{ $funcionario->nome }}</span>

                <div class="user-actions">

                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Detalhes
                        </button>


                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <p><strong>CPF:</strong> {{ $funcionario->cpf }}</p>
                            <p><strong>Nascimento:</strong> {{ $funcionario->data_nascimento->format('d/m/Y') }}</p>
                            <p><strong>Telefone:</strong> {{ $funcionario->telefone }}</p>
                            <p><strong>Gênero:</strong> {{ $funcionario->genero }}</p>
                        </div>
                    </div>


                    <a href="{{ route('funcionarios.edit', $funcionario) }}" class="action-link edit-link">Editar</a>
                    <form action="{{ route('funcionarios.destroy', $funcionario) }}" method="POST" class="delete-form">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="action-link delete-link"
                                onclick="return confirm('Tem certeza que deseja deletar este funcionário?')">Deletar
                        </button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>

</x-app-layout>

