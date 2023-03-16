<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Abonnés') }}
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
                            {{-- <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Message') }}
                            </h2> --}}

                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ __('Liste des abonnés de la newsletter') }}
                            </p>
                        </header>
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
                                        Abonné le
                                    </th>
                                    <th scope="col"
                                        class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                        Statut
                                    </th>
                                    {{-- <th scope="col" class="p-4">
                                        <span class="sr-only">Actions</span>
                                    </th> --}}
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                @foreach ($subscribers as $subscriber)
                                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                        <td
                                            class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $subscriber->email }}</td>
                                        <td
                                            class="py-4 px-6 text-sm font-medium text-gray-500 whitespace-nowrap dark:text-white">
                                            {{ $subscriber->created_at->format('d M Y, H:m') }}</td>
                                        <td
                                            class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            @if ($subscriber->unsubscride == false)
                                                <svg class="w-6 h-6 dark:text-white" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path clip-rule="evenodd" fill-rule="evenodd"
                                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z">
                                                    </path>
                                                </svg>
                                            @endif
                                            @if ($subscriber->unsubscride == true)
                                                <svg class="w-6 h-6 dark:text-white" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path clip-rule="evenodd" fill-rule="evenodd"
                                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z">
                                                    </path>
                                                </svg>
                                            @endif
                                        </td>
                                        {{-- <td
                                            class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $subscriber->created_at->format('d M Y, H:m') }}</td> --}}
                                        {{-- <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">
                                            <a href="{{ route('subscribers.show', $subscriber) }}"
                                                class="text-blue-600 dark:text-blue-500 hover:underline dark:text-white"
                                                style="display: block">Lire</a>
                                        </td> --}}
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
