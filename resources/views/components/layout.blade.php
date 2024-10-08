<!DOCTYPE html>
<html lang="en" data-theme = "light">

<head>
    {{-- METADATA --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- PWA  -->
    <meta name="theme-color" content="#6777ef" />
    <link rel="apple-touch-icon" href="{{ asset('logo.png') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name='description' content='Koperasi sekolah SMK Negeri 65 Jakarta'>
    <meta name='subject' content='Koperasi SMK Negeri 65'>

    {{-- ICON WEBSITE --}}
    <link rel="shortcut icon" class="rounded-full" href="{{ asset('assets/icons/logo_sekolah.webp') }}"
        type="image/x-icon">
    <title>Koperasi SMK Negeri 65</title>
    @vite('resources/css/app.css')

    {{-- ALPINE JS --}}



    {{-- CUSTOM CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

    {{-- CDN SCRIPT --}}
    <script src="https://cdn.tailwindcss.com"></script>


    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>

    {{-- FONTS --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200..1000;1,200..1000&display=swap"
        rel="stylesheet">

    <style>
        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .loader {
            border-top-color: transparent;
            animation: spin 1s linear infinite;
        }
    </style>
</head>

<body class="bg-white dark:bg-white no-scrollbar" x-data="{ loading: false }" x-init="$nextTick(() => loading = false)">

    <!-- Loader Element -->
    <div id="loader" class="fixed inset-0 flex items-center justify-center bg-white z-50" x-show="loading">
        <div
            class="loader border-t-transparent border-solid animate-spin rounded-full border-blue-400 border-4 h-12 w-12">
        </div>
    </div>

    <!-- Konten Utama -->
    <main x-show="!loading" x-cloak>
        @yield('content')
    </main>

    <main class="hidden md:block">
        @include('components.nodesktop')
    </main>


    @include('sweetalert::alert')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @yield('script_copyToClipBoard')

    <script>
        document.querySelectorAll('.delayed-link').forEach(function(link) {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                const href = this.getAttribute('data-href');

                setTimeout(function() {
                    window.location.href = href;
                }, 1000); // Delay 2000ms (2 detik)
            });
        });
    </script>

    <script>
        const list = document.querySelectorAll('.list');

        function activeLink() {
            list.forEach(item => item.classList.remove('active'));
            this.classList.add('active');
        }
        list.forEach(item =>
            item.addEventListener('click', activeLink))
    </script>

    <script>
        // Mendapatkan elemen input date_of_birth
        // Mendapatkan elemen input tanggal_lahir
        var inputTanggalLahir = document.getElementById("date_of_birth");

        // Menambahkan event listener untuk menghindari tanggal di masa depan
        inputTanggalLahir.addEventListener("change", function() {
            var inputDate = new Date(this.value);
            var currentDate = new Date();

            // Membandingkan tanggal yang dimasukkan dengan tanggal sekarang
            if (inputDate > currentDate) {
                let timerInterval
                Swal.fire({
                    title: 'Apakah Kamu Dari<br/>Masa Depan?',
                    html: 'Tanggal Lahir Tidak Boleh Lebih Dari Tanggal Sekarang',
                    timer: 5000,
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading()
                        const b = Swal.getHtmlContainer().querySelector('b')
                        timerInterval = setInterval(() => {
                            b.textContent = Swal.getTimerLeft()
                        }, 100)
                    },
                    willClose: () => {
                        clearInterval(timerInterval)
                    }
                }).then((result) => {
                    /* Read more about handling dismissals below */
                    if (result.dismiss === Swal.DismissReason.timer) {
                        console.log('I was closed by the timer')
                    }
                })
                this.value = ''; // Mengosongkan input jika tanggal tidak valid
            }
        });

        function editProfileForm(initialPicture, initialPhone, initialDateOfBirth) {
            return {
                selectedPicture: initialPicture,
                phone: initialPhone,
                dateOfBirth: initialDateOfBirth,
                pictures: [{
                        src: '/assets/icons/man-profile.webp'
                    },
                    {
                        src: '/assets/icons/woman-profile.webp'
                    }
                ],
                get isFormValid() {
                    return this.selectedPicture && this.phone && this.dateOfBirth;
                }
            };
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/rellax@1.12.1/rellax.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            new Rellax('.rellax');
        });
    </script>


    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

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
