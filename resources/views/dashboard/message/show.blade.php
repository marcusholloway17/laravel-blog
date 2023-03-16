<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            De: {{ $message->name }}
        </h2>
        <p>{{ $message->email }}</p>
        <a href="../messages">Retour</a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="pl-3">
                    <section>
                        <header class="mb-4 lg:mb-6 not-format">
                            <h1
                                class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">
                                {{ $message->subject }}</h1>
                        </header>
                        {{ $message->content }}
                    </section>

                    <section style="margin-top: 2rem">
                        <span
                            class="bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $message->created_at }}</span>
                    </section>
                </div>
            </div>
        </div>
</x-app-layout>
