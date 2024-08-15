<!DOCTYPE html>
<html lang="en" data-theme = "light">

<head>
    {{-- METADATA --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name='description' content='Koperasi sekolah SMK Negeri 65 Jakarta'>
    <meta name='subject' content='Koperasi SMK Negeri 65'>

    {{-- ICON WEBSITE --}}
    <link rel="shortcut icon" class="rounded-full" href="{{ asset('assets/icons/logo_sekolah.webp') }}"
        type="image/x-icon">
    <title>Koperasi SMK Negeri 65</title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite('resources/css/app.css')


    {{-- CUSTOM CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

    {{-- CDN SCRIPT --}}
    <script src="https://cdn.tailwindcss.com"></script>




    {{-- FONTS --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200..1000;1,200..1000&display=swap"
        rel="stylesheet">


    <style>
        h1 {
            display: block;
            font-size: 2em;
            margin-left: 0;
            margin-right: 0;
            font-weight: bold;
        }

        h2 {
            display: block;
            font-size: 1.5em;
            margin-left: 0;
            margin-right: 0;
            font-weight: bold;
        }

        h3 {
            display: block;
            font-size: 1.17em;
            margin-left: 0;
            margin-right: 0;
            font-weight: bold;
        }

        h4 {
            display: block;
            margin-left: 0;
            margin-right: 0;
            font-weight: bold;
        }

        h5 {
            display: block;
            font-size: 0.83em;
            margin-left: 0;
            margin-right: 0;
            font-weight: bold;
        }

        h6 {
            display: block;
            font-size: 0.67em;
            margin-left: 0;
            margin-right: 0;
            font-weight: bold;
        }

        ul {
            list-style-type: disc !important;
            list-style-position: inside !important;
        }

        ol {
            list-style-type: decimal !important;
            list-style-position: inside !important;
        }

        ul ul,
        ol ul {
            list-style-type: circle !important;
            list-style-position: inside !important;
            margin-left: 15px !important;
        }

        ol>li {
            list-style-type: decimal !important;
        }

        blockquote {
            font-style: italic !important;
            font-weight: 600 !important;
        }

        ol ol,
        ul ol {
            list-style-type: lower-latin !important;
            list-style-position: inside !important;
            margin-left: 15px !important;
        }
    </style>

</head>

<body class="bg-white dark:bg-white no-scrollbar" style="background-color: white!important">

    <main class="hidden md:block">
        @include('components.nodesktop')
    </main>

    <main class="md:hidden block no-scrollbar">

        @yield('content')


    </main>

    @include('sweetalert::alert')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @yield('script_copyToClipBoard')

    <script>
        document.querySelectorAll('.delayed-link').forEach(function(link) {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                const href = this.getAttribute('data-href');

                setTimeout(function() {
                    window.location.href = href;
                }, 2000); // Delay 2000ms (2 detik)
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

</body>

</html>
