<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ajouter une nouvelle catégorie') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <section>
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Formulaire') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __('Remplissez ce formulaire pour ajouter une nouvelle catégorie') }}
                        </p>
                    </header>
                </section>

                <section style="margin-top: 2rem">
                    <form action="{{ route('categories.store') }}" method="POST" class="mt-6 space-y-6">
                        @csrf
                        @method('post')

                        @if (session('success'))
                            <div class="bg-teal-100 border-l-4 border-teal-500 text-teal-900 p-4 shadow-md bg-white dark:bg-gray-800 dark:text-gray-100"
                                role="alert" x-data="{ show: true }" x-show="show" x-transition
                                x-init="setTimeout(() => show = false, 2000)">
                                <p class="font-bold">Succès</p>
                                <p class="text-sm">{{ session('success') }}</p>
                            </div>
                        @endif

                        <div>
                            <x-input-label for="label" :value="__('Libellé')" />
                            <x-text-input id="label" name="label" type="text" class="mt-1 block w-full"
                                required autofocus autocomplete="label" />
                            <x-input-error class="mt-2" :messages="$errors->get('label')" />
                        </div>

                        <div>
                            <x-input-label for="description" :value="__('Description')" />
                            <x-text-input id="description" name="description" type="text" class="mt-1 block w-full"
                                autocomplete="description" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Soumettre') }}</x-primary-button>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
