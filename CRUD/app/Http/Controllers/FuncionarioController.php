<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class FuncionarioController extends Controller
{
    public function index()
    {
        $funcionarios = Funcionario::orderBy('nome', 'asc')->get();
        return view('funcionarios.index', ['funcionarios' => $funcionarios]);
    }

    public function create()
    {
        return view('funcionarios.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|unique:funcionarios,cpf|regex:/^\d{11}$/',
            'data_nascimento' => 'required|date',
            'telefone' => 'required|string|regex:/^\d{10,11}$/',
            'genero' => ['required', Rule::in(['Masculino', 'Feminino', 'Outro'])],
        ]);

        Funcionario::create($validatedData);

        return redirect()->route('funcionarios.index')->with('success', 'Funcionário cadastrado com sucesso!');
    }

    public function edit(Funcionario $funcionario)
    {
        return view('funcionarios.edit', ['funcionario' => $funcionario]);
    }
    public function update(Request $request, Funcionario $funcionario)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => ['required', 'string', 'regex:/^\d{11}$/', Rule::unique('funcionarios')->ignore($funcionario->id)],
            'data_nascimento' => 'required|date',
            'telefone' => 'required|string|regex:/^\d{10,11}$/',
            'genero' => ['required', Rule::in(['Masculino', 'Feminino', 'Outro'])],
        ]);

        $funcionario->update($validatedData);

        return redirect()->route('funcionarios.index')->with('success', 'Dados do funcionário atualizados com sucesso!');
    }

    public function destroy(Funcionario $funcionario)
    {
        $funcionario->delete();

        return redirect()->route('funcionarios.index')->with('success', 'Funcionário deletado com sucesso!');
    }
}
