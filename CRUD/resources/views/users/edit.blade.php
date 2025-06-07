@extends('main')

@push('styles')
    @vite('resources/css/form.css')
@endpush

@section('content')

    <div class="form-container">
        <h2 class="form-title">Editar Usuário: {{ $user->name }}</h2>

        <form action="{{ route('users.update', $user) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name" class="form-label">Nome:</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>

                @error('name')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email" class="form-label">E-mail:</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>

                @error('email')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-actions">
                <button type="submit" class="form-button">Salvar Alterações</button>
                <a href="{{ route('users.index') }}" class="form-button-cancel">Cancelar</a>
            </div>
        </form>
    </div>

@endsection
