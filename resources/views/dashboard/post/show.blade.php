<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Article') }}
        </h2>
        <a href="../posts">Retour</a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">

                {{-- <img class="h-auto max-w-xs" src="{{ asset('/storage/' . $post->image) }}" alt="image description"> --}}

                <section class="bg-white dark:bg-gray-900">
                    <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
                        <div class="mr-auto place-self-center lg:col-span-7">
                            <h1
                                class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl dark:text-white">
                                {{ $post->title }}</h1>
                            <p
                                class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">
                                {!! html_entity_decode($post->content) !!}</p>

                        </div>
                        @if ($post->image != null )
                            <div class=" lg:mt-0 lg:col-span-5 lg:flex">
                                <img style="height: 300px" src="{{ asset('/storage/' . $post->image) }}" alt="">
                            </div>
                        @endif
                    </div>
                </section>
            </div>
        </div>
</x-app-layout>
