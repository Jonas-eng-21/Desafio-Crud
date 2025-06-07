@extends('main')

@push('styles')
    @vite('resources/css/form.css')
@endpush

@section('content')
    <div class="form-container">
        <h2 class="form-title">Cadastrar Novo Usuário</h2>

        <form action="{{ route('users.store') }}" method="POST">
            @csrf


            <div class="form-group">
                <label for="name" class="form-label">Nome:</label>
                <input type="text" id="name" name="name" class="form-control" required>

                @error('name')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email" class="form-label">E-mail:</label>
                <input type="email" id="email" name="email" class="form-control" required>

                @error('email')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Senha:</label>
                <input type="password" id="password" name="password" class="form-control" required>

                @error('password')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </div>


            <div class="form-group">
                <label for="password_confirmation" class="form-label">Confirme a Senha:</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
            </div>

            <div class="form-actions">
                <button type="submit" class="form-button">Cadastrar</button>
                <a href="{{ route('users.index') }}" class="form-button-cancel">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
