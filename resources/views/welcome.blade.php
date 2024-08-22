@extends('components.layout')

@section('content')
    {{-- <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script> --}}

    @include('components.partials.topbar')
    <main class="p-5 no-scrollbar">
        @include('components.partials.category-list')
        @include('components.partials.news')

    </main>
    @include('components.partials.navbar')

    <div x-data="{ open: true }" x-init="document.body.style.overflow = 'hidden';" x-show="open"
        x-transition:enter="transition ease-out duration-300 opacity-0" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-50" x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="fixed w-full inset-0 z-50 flex px-5 items-center justify-center overflow-auto bg-opacity-50">
        <div class="fixed w-full inset-0 z-30 flex px-5 items-center justify-center overflow-auto bg-opacity-50">
            <div class="fixed inset-0 bottom-0 top-0 z-50 backdrop-custom bg-opacity-50"></div>

            <div @click.away="open = false; document.body.style.overflow = 'auto';"
                class="bg-white relative z-50 rounded-lg shadow-lg w-full max-w-md">
                <button @click="open = false; document.body.style.overflow = 'auto';"
                    class="absolute -top-4 -right-2 m-4 text-black" style="width: 20px">&times;</button>
                <div class="flex justify-center flex-col gap-4 items-center py-4">
                    <h1 class="text-3xl">Menemukan Error/Bug?</h1>
                    <h1>Laporkan Ke Developer</h1>
                    <a href="https://wa.me/+6288214367530?text=Bang developer, ada bug nih di web koprasi">
                        <button
                            class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 h-10 px-4 py-2 group bg-gray-900 hover:bg-gray-950 transition-all duration-200 ease-in-out hover:ring-2 hover:ring-offset-2 hover:ring-gray-900">
                            <svg class="mr-2 text-white" stroke-linejoin="round" stroke-linecap="round" stroke-width="2"
                                stroke="currentColor" fill="none" viewBox="0 0 24 24" height="24" width="24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M15 22v-4a4.8 4.8 0 0 0-1-3.5c3 0 6-2 6-5.5.08-1.25-.27-2.48-1-3.5.28-1.15.28-2.35 0-3.5 0 0-1 0-3 1.5-2.64-.5-5.36-.5-8 0C6 2 5 2 5 2c-.3 1.15-.3 2.35 0 3.5A5.403 5.403 0 0 0 4 9c0 3.5 3 5.5 6 5.5-.39.49-.68 1.05-.85 1.65-.17.6-.22 1.23-.15 1.85v4">
                                </path>
                                <path d="M9 18c-4.51 2-5-2-7-2"></path>
                            </svg>
                            <span class="text-white">Lapor Developer</span>
                        </button>
                    </a>

                </div>
            </div>
        </div>
    </div>
@endsection
