@extends('main')

@push('styles')
    @vite('resources/css/form.css')
@endpush

@section('content')

    <div class="form-container">
        <h2 class="form-title">Editar Funcionário: {{ $funcionario->nome }}</h2>

        <form action="{{ route('funcionarios.update', $funcionario) }}" method="POST">
            @csrf
            @method('PUT')


            <div class="form-group">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" id="nome" name="nome" class="form-control" value="{{ old('nome', $funcionario->nome) }}" required>
                @error('nome')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="cpf" class="form-label">CPF:</label>
                <input type="text" id="cpf" name="cpf" class="form-control" value="{{ old('cpf', $funcionario->cpf) }}" required>
                @error('cpf')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="data_nascimento" class="form-label">Data de Nascimento:</label>
                <input type="date" id="data_nascimento" name="data_nascimento" class="form-control" value="{{ old('data_nascimento', $funcionario->data_nascimento->format('Y-m-d')) }}" required>
                @error('data_nascimento')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="telefone" class="form-label">Telefone:</label>
                <input type="tel" id="telefone" name="telefone" class="form-control" value="{{ old('telefone', $funcionario->telefone) }}" required>
                @error('telefone')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </div>


            <div class="form-group">
                <label for="genero" class="form-label">Gênero:</label>
                <select id="genero" name="genero" class="form-control" required>
                    <option value="Masculino" {{ old('genero', $funcionario->genero) == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                    <option value="Feminino" {{ old('genero', $funcionario->genero) == 'Feminino' ? 'selected' : '' }}>Feminino</option>
                    <option value="Outro" {{ old('genero', $funcionario->genero) == 'Outro' ? 'selected' : '' }}>Outro</option>
                </select>
                @error('genero')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-actions">
                <button type="submit" class="form-button">Salvar Alterações</button>
                <a href="{{ route('funcionarios.index') }}" class="form-button-cancel">Cancelar</a>
            </div>
        </form>
    </div>

@endsection
