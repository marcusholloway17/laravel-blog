<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Publications') }}
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
                    <div class="flex justify-between">
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Liste d\'article') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ __('Menu de gestion des articles publiés') }}
                            </p>
                        </header>

                        <button
                            class="text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-700 focus:outline-none focus:text-gray-700 dark:focus:text-gray-300 focus:border-gray-300 dark:focus:border-gray-700 transition duration-150 ease-in-out">
                            <a href="{{ route('posts.create') }}">Rédiger</a>
                        </button>
                    </div>
                </section>

                <section style="margin-top: 2rem;">
                    <div class="px-3 py-4 ">
                        <table class="min-w-max w-full table-auto">
                            <thead class="bg-gray-100 dark:bg-gray-700">
                                <tr>
                                    <th scope="col" class="p-4">
                                        <div class="flex items-center">
                                            <input id="checkbox-all-search" type="checkbox"
                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="checkbox-all-search" class="sr-only">checkbox</label>
                                        </div>
                                    </th>
                                    <th scope="col"
                                        class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                        {{ __('Titre') }}
                                    </th>
                                    <th scope="col"
                                        class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                        {{ __('Contenu') }}
                                    </th>
                                    <th scope="col"
                                        class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                        {{ __('Categorie') }}
                                    </th>
                                    <th scope="col"
                                        class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                        {{ __('Auteur') }}
                                    </th>
                                    <th scope="col"
                                        class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                        {{ __('Publié le') }}
                                    </th>
                                    <th scope="col" class="p-4">
                                        <span class="sr-only">Actions</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                @foreach ($posts as $post)
                                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                        <th scope="row"
                                            class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                            <img class="w-10 h-10 rounded-full"
                                                src="{{ asset('/storage/' . $post->image) }}" alt="">
                                            <div class="pl-3">
                                        <td
                                            class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ Str::limit($post->title, 20, '...') }}</td>
                    </div>
                    </th>

                    <td class="py-4 px-6 text-sm font-medium text-gray-500 whitespace-nowrap dark:text-white">
                        {{ Str::limit($post->content, 20, '...') }}</td>
                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $post->category->label }}
                    </td>
                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $post->user->name }}
                    </td>
                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $post->created_at->format('d M Y, H:m') }}
                    </td>
                    <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">
                        <a href="{{ route('posts.edit', $post) }}"
                            class="text-blue-600 dark:text-blue-500 hover:underline dark:text-white"
                            style="display: block">Editer</a>

                        <form action="{{ route('posts.destroy', $post) }}" method="post" style="display: block">
                            @csrf
                            @method('delete')
                            <button
                                class="text-red-600 dark:text-blue-500 hover:underline dark:text-red align-items-md-end">
                                Supprimer
                            </button>
                        </form>
                    </td>
                    </tr>
                    @endforeach
                    </tbody>
                    </table>
            </div>
            </section>
        </div>
    </div>
    </div>
</x-app-layout>
