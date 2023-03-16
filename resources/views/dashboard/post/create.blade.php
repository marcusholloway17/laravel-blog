<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Publier un article') }}
        </h2>

        @if (session('success'))
            <div class="bg-teal-100 border-l-4 border-teal-500 text-teal-900 p-4 shadow-md bg-white dark:bg-gray-800 dark:text-gray-100 mt-5"
                role="alert" x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)">
                <p class="font-bold">Succès</p>
                <p class="text-sm">{{ session('success') }}</p>
            </div>
        @endif
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
                            {{ __('Remplissez ce formulaire pour publier un nouvel article') }}
                        </p>
                    </header>
                </section>

                <section style="margin-top: 2rem">
                    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="mt-6 space-y-6">
                        @csrf
                        @method('post')

                        <div>
                            <x-input-label for="title" :value="__('Titre')" />
                            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full"
                                required autofocus autocomplete="title" />
                            <x-input-error class="mt-2" :messages="$errors->get('title')" />
                        </div>

                        <div>
                            <x-input-label for="content" :value="__('Contenu')" />
                            <textarea id="summernote" name="content" class="mt-1 block w-full" required></textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('content')" />
                        </div>

                        <div>
                            <x-input-label for="category" :value="__('Categorie')" />
                            <select name="category" id="category"
                                class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded leading-tight focus:outline-none focus:shadow-outline">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"> {{ $category->label }}</option>
                                @endforeach
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('category')" />
                        </div>

                        <div>
                            <x-input-label for="image" value="Image mise en avant"></x-input-label>
                            <x-text-input id="image" name="image" type=file required></x-text-input>
                            <x-input-error class="mt-2" :messages="$errors->get('image')" />
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
