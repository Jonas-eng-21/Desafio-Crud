<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreFuncionarioRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        // Limpa a pontuação do CPF e do telefone
        $this->merge([
            'cpf' => preg_replace('/[^0-9]/', '', $this->cpf),
            'telefone' => preg_replace('/[^0-9]/', '', $this->telefone),
        ]);
    }

    public function rules(): array
    {
        return [
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|unique:funcionarios,cpf|digits:11',
            'data_nascimento' => 'required|date',
            'telefone' => 'required|string|digits_between:10,11',
            'genero' => ['required', Rule::in(['Masculino', 'Feminino', 'Outro'])],
        ];
    }
}
