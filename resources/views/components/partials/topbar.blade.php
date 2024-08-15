<nav class="px-5 bg-white shadow-lg py-5 rounded-b-[20px] sticky top-0 z-50">
    <div class="float-end">
        <a href="/my-cart">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                viewBox="0 0 576 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                <path
                    d="M0 24C0 10.7 10.7 0 24 0L69.5 0c22 0 41.5 12.8 50.6 32l411 0c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3l-288.5 0 5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5L488 336c13.3 0 24 10.7 24 24s-10.7 24-24 24l-288.3 0c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5L24 48C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z" />
            </svg>
        </a>
    </div>
    <header class="font-bold font-mulish">
        <h1 class=" text-[32px] text-">Koperasi</h1>
        <h1 class="text-xl ">SMKN 65 JAKARTA</h1>
    </header>
    <div class="flex gap-4 mt-4 relative items-center">
        @include('components.partials.search')
        @if (Request::is('/'))
            @include('components.partials.avatar')
        @else
        @endif
    </div>
</nav>
