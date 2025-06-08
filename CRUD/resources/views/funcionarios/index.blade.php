<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Funcionários') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="flex justify-end mb-4">
                        <a href="{{ route('funcionarios.create') }}"
                           class="inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-600 active:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                            Cadastrar Novo Funcionário
                        </a>
                    </div>

                    <div class="mt-6 border-t border-gray-200 dark:border-gray-700">
                        <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                            @if($funcionarios->isEmpty())
                                <li class="py-4 text-center text-gray-500 dark:text-gray-400">
                                    Nenhum funcionário cadastrado.
                                </li>
                            @else
                                @foreach ($funcionarios as $funcionario)
                                    <li x-data="{ confirmingDeletion: false }"
                                        class="flex items-center justify-between py-4">
                                        <span class="font-medium">{{ $funcionario->nome }}</span>

                                        <div class="flex items-center gap-x-4">

                                            <div x-data="{ open: false }" class="relative inline-block text-left">
                                                <button @click="open = !open" type="button"
                                                        class="inline-flex justify-center w-full gap-x-1.5 rounded-md bg-white dark:bg-gray-800 px-3 py-2 text-sm font-semibold text-gray-900 dark:text-gray-300 shadow-sm ring-1 ring-inset ring-gray-300 dark:ring-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700">
                                                    Detalhes
                                                    <svg class="-mr-1 h-5 w-5 text-gray-400" viewBox="0 0 20 20"
                                                         fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                              d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                                                              clip-rule="evenodd"/>
                                                    </svg>
                                                </button>

                                                <div x-show="open" @click.away="open = false" x-transition
                                                     class="absolute right-0 z-10 w-56 rounded-md bg-white dark:bg-gray-900 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none @if($loop->last && !$loop->first) bottom-full mb-2 origin-bottom-right @else mt-2 origin-top-right @endif"
                                                     style="display: none;">
                                                    <div class="px-4 py-3">
                                                        <p class="text-sm text-gray-600 dark:text-gray-400">
                                                            <strong>CPF:</strong> {{ $funcionario->cpf }}</p>
                                                        <p class="text-sm text-gray-600 dark:text-gray-400"><strong>Nascimento:</strong> {{ $funcionario->data_nascimento->format('d/m/Y') }}
                                                        </p>
                                                        <p class="text-sm text-gray-600 dark:text-gray-400"><strong>Telefone:</strong> {{ $funcionario->telefone }}
                                                        </p>
                                                        <p class="text-sm text-gray-600 dark:text-gray-400"><strong>Gênero:</strong> {{ $funcionario->genero }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                            <a href="{{ route('funcionarios.edit', $funcionario) }}"
                                               class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-900 dark:hover:text-indigo-300">Editar</a>

                                            <button @click="confirmingDeletion = true"
                                                    class="text-red-600 dark:text-red-400 hover:text-red-900 dark:hover:text-red-300">
                                                Deletar
                                            </button>

                                            <div x-show="confirmingDeletion" x-transition
                                                 class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-50"
                                                 style="display: none;">
                                                <div @click.away="confirmingDeletion = false"
                                                     class="bg-white dark:bg-gray-800 rounded-lg shadow-xl p-6 w-full max-w-md">
                                                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                                        Confirmar Exclusão</h2>
                                                    <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                                                        Tem certeza que deseja deletar o funcionário(a)
                                                        <strong>{{ $funcionario->nome }}</strong>? Esta ação não pode
                                                        ser desfeita.
                                                    </p>
                                                    <form action="{{ route('funcionarios.destroy', $funcionario) }}"
                                                          method="POST" class="mt-6 flex justify-end">
                                                        @csrf
                                                        @method('DELETE')
                                                        <x-secondary-button @click="confirmingDeletion = false">
                                                            {{ __('Cancelar') }}
                                                        </x-secondary-button>
                                                        <x-danger-button class="ms-3">
                                                            {{ __('Sim, Deletar') }}
                                                        </x-danger-button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

