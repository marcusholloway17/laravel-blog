<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Message') }}
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
                                {{ __('Message') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ __('Liste de message de contact') }}
                            </p>
                        </header>

                        {{-- <button
                            class="text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-700 focus:outline-none focus:text-gray-700 dark:focus:text-gray-300 focus:border-gray-300 dark:focus:border-gray-700 transition duration-150 ease-in-out">
                            <a href="{{ route('message.create') }}">Ajouter</a>
                        </button> --}}
                    </div>
                </section>

                <section style="margin-top: 2rem;">
                    <div class="px-3 py-4 ">
                        <table class="min-w-max w-full table-auto">
                            <thead class="bg-gray-100 dark:bg-gray-700">
                                <tr>
                                    <th scope="col"
                                        class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                        Email
                                    </th>
                                    <th scope="col"
                                        class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                        Nom
                                    </th>
                                    <th scope="col"
                                        class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                        Sujet
                                    </th>
                                    <th scope="col"
                                        class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                        Date
                                    </th>
                                    <th scope="col"
                                        class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                        Lu
                                    </th>
                                    <th scope="col" class="p-4">
                                        <span class="sr-only">Actions</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                @foreach ($messages as $message)
                                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                        <td
                                            class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ Str::limit($message->email, 20, '...') }}</td>
                                        <td
                                            class="py-4 px-6 text-sm font-medium text-gray-500 whitespace-nowrap dark:text-white">
                                            {{ Str::limit($message->name, 20, '...') }}</td>
                                        <td
                                            class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ Str::limit($message->subject, 50, '...') }}</td>
                                        <td
                                            class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $message->created_at->format('d M Y, H:m') }}</td>
                                        <td
                                            class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            @if ($message->read == true)
                                                <svg class="w-6 h-6 dark:text-white" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                            @endif
                                            @if ($message->read == false)
                                                <svg class="w-6 h-6 dark:text-white" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path clip-rule="evenodd" fill-rule="evenodd"
                                                        d="M3.28 2.22a.75.75 0 00-1.06 1.06l14.5 14.5a.75.75 0 101.06-1.06l-1.745-1.745a10.029 10.029 0 003.3-4.38 1.651 1.651 0 000-1.185A10.004 10.004 0 009.999 3a9.956 9.956 0 00-4.744 1.194L3.28 2.22zM7.752 6.69l1.092 1.092a2.5 2.5 0 013.374 3.373l1.091 1.092a4 4 0 00-5.557-5.557z">
                                                    </path>
                                                    <path
                                                        d="M10.748 13.93l2.523 2.523a9.987 9.987 0 01-3.27.547c-4.258 0-7.894-2.66-9.337-6.41a1.651 1.651 0 010-1.186A10.007 10.007 0 012.839 6.02L6.07 9.252a4 4 0 004.678 4.678z">
                                                    </path>
                                                </svg>
                                            @endif
                                        </td>
                                        <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">
                                            <a href="{{ route('messages.show', $message) }}"
                                                class="text-blue-600 dark:text-blue-500 hover:underline dark:text-white"
                                                style="display: block">Lire</a>
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
