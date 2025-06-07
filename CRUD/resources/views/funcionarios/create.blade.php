@extends('main')

@push('styles')
    @vite('resources/css/form.css')
@endpush

@push('scripts')
    @vite('resources/js/funcionario-validation.js')
@endpush

@section('content')

    <div class="form-container">
        <h2 class="form-title">Cadastrar Novo Funcionário</h2>

        <form action="{{ route('funcionarios.store') }}" method="POST" id="createFuncionarioForm" novalidate>
            @csrf


            <div class="form-group">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" id="nome" name="nome" class="form-control" value="{{ old('nome') }}">
                <div class="js-error-message error-message"></div>
                @error('nome')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="cpf" class="form-label">CPF:</label>
                <input type="text" id="cpf" name="cpf" class="form-control" value="{{ old('cpf') }}" placeholder="Apenas números">
                <div class="js-error-message error-message"></div>
                @error('cpf')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="data_nascimento" class="form-label">Data de Nascimento:</label>
                <input type="date" id="data_nascimento" name="data_nascimento" class="form-control" value="{{ old('data_nascimento') }}">
                <div class="js-error-message error-message"></div>
                @error('data_nascimento')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="telefone" class="form-label">Telefone:</label>
                <input type="tel" id="telefone" name="telefone" class="form-control" value="{{ old('telefone') }}" placeholder="Apenas números">
                <div class="js-error-message error-message"></div>
                @error('telefone')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="genero" class="form-label">Gênero:</label>
                <select id="genero" name="genero" class="form-control">
                    <option value="" selected disabled>Selecione uma opção</option>
                    <option value="Masculino" {{ old('genero') == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                    <option value="Feminino" {{ old('genero') == 'Feminino' ? 'selected' : '' }}>Feminino</option>
                    <option value="Outro" {{ old('genero') == 'Outro' ? 'selected' : '' }}>Outro</option>
                </select>
                <div class="js-error-message error-message"></div>
                @error('genero')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-actions">
                <button type="submit" class="form-button">Cadastrar</button>
                <a href="{{ route('funcionarios.index') }}" class="form-button-cancel">Cancelar</a>
            </div>
        </form>
    </div>

@endsection
