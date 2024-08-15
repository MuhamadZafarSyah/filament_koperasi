<!DOCTYPE html>
<html lang="en">

<head>
    {{-- METADATA --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name='description' content='Koperasi sekolah SMK Negeri 65 Jakarta'>
    <meta name='subject' content='Koperasi SMK Negeri 65'>

    {{-- ICON WEBSITE --}}
    <link rel="shortcut icon" class="rounded-full" href="{{ asset('assets/icons/logo_sekolah.webp') }}">

    <title>Koperasi SMK Negeri 65</title>
    <!-- PWA  -->
    <meta name="theme-color" content="#6777ef" />
    <link rel="apple-touch-icon" href="{{ asset('logo.png') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}">

    {{-- CUSTOM CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

    {{-- CDN SCRIPT --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>


    {{-- FONTS --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200..1000;1,200..1000&display=swap"
        rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200..1000;1,200..1000&display=swap');


        * {
            font-family: 'Mulish', sans-serif;
        }

        .gradient-main {
            background-image: linear-gradient(to bottom right, #00a1e9, #6367b0);
        }

        .border-none-input {
            border: none !important;
        }
    </style>

    @vite('resources/css/app.css')
</head>

<body>

    <main class="hidden md:block">
        @include('components.nodesktop')
    </main>

    <main class="block md:hidden">
        <section x-data="{ 'showSignInModal': false, 'showRegisterModal': false }" @keydown.escape="showModal = false"
            class="container dark:bg-white bg-white relative mx-auto h-lvh px-5 py-8">
            <div class="w-full flex items-center justify-end">
                <picture>
                    <source srcset='{{ asset('assets/icons/logo_sekolah.webp') }}' type='image/webp'>
                    <img width="75" height="75" src='{{ asset('assets/icons/logo_sekolah.webp') }}'
                        alt='Logo SMK Negeri 65'>
                </picture>
            </div>
            <header class="font-medium text-[32px] font-mulish">
                <h1>Koperasi</h1>
                <h1>SMKN 65 Jakarta</h1>
            </header>
            <div>
                <span class="text-[16px]">Aplikasi pembelian barang <br> non tunai</span>
            </div>
            <div class="w-full py-14 mx-auto">
                <picture>
                    <source srcset='{{ asset('assets/icons/login_ilustration.webp') }}' type='image/png'>
                    <img class="mx-auto" width="332" height="244"
                        src='{{ asset('assets/icons/login_ilustration.webp') }}' alt='Ilustrasi halaman login'>
                </picture>
            </div>


            <div class="mt-10">
                <button type="button" @click="showSignInModal = true"
                    class="w-full py-3 text-center rounded-md font-medium text-white bg-black gradient-main">Login</button>
            </div>

            <!-- Sign In Modal -->
            <div class="fixed w-full inset-0 z-30 flex px-5 items-center justify-center overflow-auto bg-opacity-50"
                x-show="showSignInModal">
                <!-- Modal Background -->
                <div class="fixed inset-0 bottom-0 top-0 -z-10 bg-black bg-opacity-50"></div>
                <!-- Modal Content -->
                <div class="max-w-3xl w-full px-6 py-4 mx-auto text-left text-white gradient-main rounded-xl shadow-lg"
                    @click.away="showSignInModal = false" x-show="showSignInModal"
                    x-transition:enter="transition-transform easein bounce duration-700 opacity-100"
                    x-transition:enter-start="opacity-100 transform -translate-y-80"
                    x-transition:enter-end="opacity-100 bounce transform translate-y-0"
                    x-transition:leave="transition ease bounce duration-300"
                    x-transition:leave-end="opacity-0 transform ">
                    <div class="flex flex-col justify-between relative">
                        <h5 class="mr-3 max-w-none text-[32px] font-bold font-mulish">Sign In</h5>
                        <form action="/auth" method="post">
                            @csrf
                            <input type="hidden" name="action" value="login">
                            <div class="text-white mt-5">
                                <label for="email">Email</label>
                                <div class="rounded-md border-2 border-white text-white items-center flex p-2 gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white"
                                        viewBox="0 0 512 512">
                                        <path
                                            d="M64 112c-8.8 0-16 7.2-16 16l0 22.1L220.5 291.7c20.7 17 50.4 17 71.1 0L464 150.1l0-22.1c0-8.8-7.2-16-16-16L64 112zM48 212.2L48 384c0 8.8 7.2 16 16 16l384 0c8.8 0 16-7.2 16-16l0-171.8L322 328.8c-38.4 31.5-93.7 31.5-132 0L48 212.2zM0 128C0 92.7 28.7 64 64 64l384 0c35.3 0 64 28.7 64 64l0 256c0 35.3-28.7 64-64 64L64 448c-35.3 0-64-28.7-64-64L0 128z" />
                                    </svg>
                                    <input type="email" name="email"
                                        class="w-full bg-transparent inset-0 shadow-inner text-sm focus-visible:outline-none placeholder-white autofill:bg-transparent autofill:selection:bg-transparent  autofill:outline-none focus-visible:bg-transparent"
                                        placeholder="Email@addres.com">
                                </div>
                            </div>
                            <div class="text-white mt-5">
                                <label for="password">Password</label>
                                <div class="rounded-md border-2 border-white text-white items-center flex p-2 gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white"
                                        viewBox="0 0 448 512">
                                        <path
                                            d="M144 144l0 48 160 0 0-48c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192l0-48C80 64.5 144.5 0 224 0s144 64.5 144 144l0 48 16 0c35.3 0 64 28.7 64 64l0 192c0 35.3-28.7 64-64 64L64 512c-35.3 0-64-28.7-64-64L0 256c0-35.3 28.7-64 64-64l16 0z" />
                                    </svg>
                                    <input type="password" name="password" id="password"
                                        class="w-full bg-transparent focus-visible:outline-none text-sm placeholder-white"
                                        placeholder="*******">
                                    <svg xmlns="http://www.w3.org/2000/svg" type="checkbox" onclick="myFunction()"
                                        width="20" height="20" fill="white" viewBox="0 0 576 512">
                                        <path
                                            d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="mt-10">
                                <button type="submit"
                                    class="w-full py-3 text-center rounded-md font-medium text-black bg-white">Login</button>
                                <div class="flex items-center my-4">
                                    <div class="border-t border border-white flex-grow"></div>
                                    <div class="px-2 text-white text-base">or</div>
                                    <div class="border-t border border-white flex-grow"></div>
                                </div>

                                {{-- LOGIN WITH GOOGLE BUTTON --}}
                                <a href="/auth/redirect">
                                    <button type="button"
                                        class="w-full py-3 text-center rounded-md font-medium text-black bg-white flex items-center justify-center gap-2">
                                        <span class="w-fit inline-block"> <svg xmlns="http://www.w3.org/2000/svg"
                                                x="0px" y="0px" width="25" height="25" viewBox="0 0 48 48">
                                                <path fill="#FFC107"
                                                    d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z">
                                                </path>
                                                <path fill="#FF3D00"
                                                    d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z">
                                                </path>
                                                <path fill="#4CAF50"
                                                    d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z">
                                                </path>
                                                <path fill="#1976D2"
                                                    d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z">
                                                </path>
                                            </svg>
                                        </span>Login with Google
                                    </button>
                                </a>
                                <div class="flex flex-col items-center justify-center my-4">
                                    <span>Belum memiliki akun?</span>
                                    <a href="javascript:void(0)"
                                        @click="showSignInModal = false; showRegisterModal = true"
                                        class="text-white italic">Registrasi</a>
                                </div>
                            </div>
                        </form>
                        <!-- Close Modal -->
                        <button type="button" class="z-50 cursor-pointer absolute right-0 top-0"
                            @click="showSignInModal = false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Register Modal -->
            <div class="fixed w-full inset-0 z-30 flex px-5 items-center justify-center overflow-auto bg-opacity-50"
                x-show="showRegisterModal">
                <!-- Modal Background -->
                <div class="fixed inset-0 bottom-0 top-0 -z-10 bg-black bg-opacity-50"></div>
                <!-- Modal Content -->
                <div class="max-w-3xl w-full px-6 py-4 mx-auto text-left text-white gradient-main rounded-xl shadow-lg"
                    @click.away="showRegisterModal = false" x-show="showRegisterModal"
                    x-transition:enter="transition-transform ease-in duration-100 opacity-0 "
                    x-transition:enter-start="opacity-100 transform -translate-y-80"
                    x-transition:enter-end="opacity-100 transform translate-y-0"
                    x-transition:leave="transition ease-in duration-300"
                    x-transition:leave-end="opacity-100 transform -translate-y-80">
                    <div class="flex flex-col justify-between relative">
                        <h5 class="mr-3 max-w-none text-[32px] font-bold font-mulish">Register</h5>
                        <form action="/auth" method="POST">
                            @csrf
                            <input type="hidden" name="action" value="register">
                            <div class="text-white mt-5">
                                <label for="name">Name</label>
                                <div
                                    class="rounded-md border-2 border-white  @error('name') border-red-600
                                    @enderror text-white items-center flex p-2 gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        fill="white" viewBox="0 0 448 512">
                                        <path
                                            d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm124.8 32h-8.5c-25.4 10.9-52.9 16-80.8 16s-55.4-5.1-80.8-16h-8.5C90.7 288 0 378.7 0 490.5 0 504.9 7.1 512 16 512H432c8.9 0 16-7.1 16-16.5 0-111.8-90.7-202.5-199.2-202.5z" />
                                    </svg>
                                    <input required type="name" name="name"
                                        class="w-full bg-transparent text-sm focus-visible:outline-none  placeholder-white"
                                        placeholder="Your Name">
                                </div>
                                @error('name')
                                    <div class="absolute text-xs text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="text-white mt-5">
                                <label for="email">Email</label>
                                <div
                                    class="rounded-md border-2 border-white @error('email') border-red-600
                                    @enderror text-white items-center flex p-2 gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        fill="white" viewBox="0 0 512 512">
                                        <path
                                            d="M64 112c-8.8 0-16 7.2-16 16l0 22.1L220.5 291.7c20.7 17 50.4 17 71.1 0L464 150.1l0-22.1c0-8.8-7.2-16-16-16L64 112zM48 212.2L48 384c0 8.8 7.2 16 16 16l384 0c8.8 0 16-7.2 16-16l0-171.8L322 328.8c-38.4 31.5-93.7 31.5-132 0L48 212.2zM0 128C0 92.7 28.7 64 64 64l384 0c35.3 0 64 28.7 64 64l0 256c0 35.3-28.7 64-64 64L64 448c-35.3 0-64-28.7-64-64L0 128z" />
                                    </svg>
                                    <input required type="email" name="email"
                                        class="w-full bg-transparent text-sm @error('password') border-red-600
                                    @enderror focus-visible:outline-none placeholder-white"
                                        placeholder="Email@address.com">
                                </div>
                                @error('email')
                                    <div class="absolute text-xs text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="text-white mt-5">
                                <select id="class" name="class"
                                    class="bg-transparent rounded-md border-2 border-white text-sm  focus:ring-white focus:border-white block w-full p-2.5 ">
                                    <option selected disabled>Kelas Kamu</option>
                                    <option class="text-black">XII PPLG 1</option>
                                    <option class="text-black">XII PPLG 2</option>
                                    <option class="text-black">XII DKV 1</option>
                                    <option class="text-black">XII DKV 2</option>
                                    <option class="text-black">XII BCF 1</option>
                                    <option class="text-black">XII BCF 2</option>
                                    <option class="text-black">XI PPLG 1</option>
                                    <option class="text-black">XI PPLG 2</option>
                                    <option class="text-black">XI DKV 1</option>
                                    <option class="text-black">XI DKV 2</option>
                                    <option class="text-black">XI BCF 1</option>
                                    <option class="text-black">XI BCF 2</option>
                                    <option class="text-black">X PPLG 1</option>
                                    <option class="text-black">X PPLG 2</option>
                                    <option class="text-black">X DKV 1</option>
                                    <option class="text-black">X DKV 2</option>
                                    <option class="text-black">X BCF 1</option>
                                    <option class="text-black">X BCF 2</option>

                                </select>
                            </div>
                            <div class="text-white mt-5">
                                <label for="password">Password</label>
                                <div class="rounded-md border-2 border-white text-white items-center flex p-2 gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        fill="white" viewBox="0 0 448 512">
                                        <path
                                            d="M144 144l0 48 160 0 0-48c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192l0-48C80 64.5 144.5 0 224 0s144 64.5 144 144l0 48 16 0c35.3 0 64 28.7 64 64l0 192c0 35.3-28.7 64-64 64L64 512c-35.3 0-64-28.7-64-64L0 256c0-35.3 28.7-64 64-64l16 0z" />
                                    </svg>
                                    <input required type="password" name="password" id="password2"
                                        class="w-full bg-transparent focus-visible:outline-none text-sm placeholder-white"
                                        placeholder="*******">
                                    <svg xmlns="http://www.w3.org/2000/svg" type="checkbox" onclick="myFunction2()"
                                        width="20" height="20" fill="white" viewBox="0 0 576 512">
                                        <path
                                            d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z" />
                                    </svg>
                                </div>
                                @error('password')
                                    <div class="absolute text-xs text-red-500">{{ $message }}</div>
                                @enderror
                                <div class="mt-10 mb-4">
                                    <button type="submit" wire:click="register"
                                        class="w-full py-3 text-center rounded-md font-medium text-black bg-white">Register
                                    </button>
                                    {{-- <div class="flex flex-col items-center justify-center my-4">
                                    <span>Sudah memiliki akun?</span>
                                    <a href="javascript:void(0)"
                                        @click="showRegisterModal = false; showSignInModal = true"
                                        class="text-white italic">Login</a>
                                </div> --}}
                                </div>
                        </form>
                        <!-- Close Modal -->
                        <button type="button" class="z-50 cursor-pointer absolute right-0 top-0"
                            @click="showRegisterModal = false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </section>
    </main>
    @include('sweetalert::alert')

    <script>
        function myFunction() {
            var x = document.getElementById("password");
            // var icon = document.getElementsByClassName("password-icon")[0];
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }

        function myFunction2() {
            var y = document.getElementById("password2");
            // var icon = document.getElementsByClassName("password-icon")[0];
            if (y.type === "password") {
                y.type = "text";
            } else {
                y.type = "password";
            }
        }
    </script>

    <script src="{{ asset('/sw.js') }}"></script>
    <script>
        if ("serviceWorker" in navigator) {
            // Register a service worker hosted at the root of the
            // site using the default scope.
            navigator.serviceWorker.register("/sw.js").then(
                (registration) => {
                    console.log("Service worker registration succeeded:", registration);
                },
                (error) => {
                    console.error(`Service worker registration failed: ${error}`);
                },
            );
        } else {
            console.error("Service workers are not supported.");
        }
    </script>
</body>

</html>
