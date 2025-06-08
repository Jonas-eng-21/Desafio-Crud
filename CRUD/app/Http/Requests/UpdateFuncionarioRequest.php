<?php

namespace App\Http\Requests;

use App\Rules\Cpf;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateFuncionarioRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'cpf' => preg_replace('/[^0-9]/', '', $this->cpf),
            'telefone' => preg_replace('/[^0-9]/', '', $this->telefone),
        ]);
    }

    public function rules(): array
    {
        $funcionarioId = $this->route('funcionario')->id;

        return [
            'nome' => 'required|string|max:255',
            'cpf' => ['required', 'string', Rule::unique('funcionarios')->ignore($funcionarioId), new Cpf],
            'data_nascimento' => 'required|date',
            'telefone' => 'required|string|digits_between:10,11',
            'genero' => ['required', Rule::in(['Masculino', 'Feminino', 'Outro'])],
        ];
    }
}
