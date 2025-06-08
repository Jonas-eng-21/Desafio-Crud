<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Funcionários') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <h2 class="text-2xl font-semibold mb-6 text-center">Editando: {{ $funcionario->nome }}</h2>

                    <form x-data action="{{ route('funcionarios.update', $funcionario) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-6">
                            <x-input-label for="nome" :value="__('Nome')"/>
                            <x-text-input id="nome" name="nome" type="text" class="mt-1 block w-full"
                                          :value="old('nome', $funcionario->nome)" required autofocus/>
                            <x-input-error class="mt-2" :messages="$errors->get('nome')"/>
                        </div>

                        <div class="mb-6">
                            <x-input-label for="cpf" :value="__('CPF')"/>
                            <x-text-input x-mask="999.999.999-99" id="cpf" name="cpf" type="text"
                                          class="mt-1 block w-full" :value="old('cpf', $funcionario->cpf)" required
                                          placeholder="___.___.___-__"/>
                            <x-input-error class="mt-2" :messages="$errors->get('cpf')"/>
                        </div>

                        <div class="mb-6">
                            <x-input-label for="data_nascimento" :value="__('Data de Nascimento')"/>
                            <x-text-input id="data_nascimento" name="data_nascimento" type="date"
                                          class="mt-1 block w-full"
                                          :value="old('data_nascimento', $funcionario->data_nascimento->format('Y-m-d'))"
                                          required/>
                            <x-input-error class="mt-2" :messages="$errors->get('data_nascimento')"/>
                        </div>

                        <div class="mb-6">
                            <x-input-label for="telefone" :value="__('Telefone')"/>
                            <x-text-input x-mask:dynamic="$input.length > 14 ? '(99) 99999-9999' : '(99) 9999-9999'"
                                          id="telefone" name="telefone" type="tel" class="mt-1 block w-full"
                                          :value="old('telefone', $funcionario->telefone)" required
                                          placeholder="(__) _____-____"/>
                            <x-input-error class="mt-2" :messages="$errors->get('telefone')"/>
                        </div>

                        <div class="mb-6">
                            <x-input-label for="genero" :value="__('Gênero')"/>
                            <select id="genero" name="genero"
                                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                                    required>
                                <option value="Masculino" @selected(old('genero', $funcionario->genero) == 'Masculino')>
                                    Masculino
                                </option>
                                <option value="Feminino" @selected(old('genero', $funcionario->genero) == 'Feminino')>
                                    Feminino
                                </option>
                                <option value="Outro" @selected(old('genero', $funcionario->genero) == 'Outro')>Outro
                                </option>
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('genero')"/>
                        </div>

                        <div class="flex items-center justify-end mt-6">
                            <a href="{{ route('funcionarios.index') }}"
                               class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                Cancelar
                            </a>

                            <x-primary-button class="ms-4">
                                {{ __('Salvar Alterações') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
