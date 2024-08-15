document.querySelectorAll(".delayed-link").forEach(function (link) {
    link.addEventListener("click", function (event) {
        event.preventDefault();
        const href = this.getAttribute("data-href");

        setTimeout(function () {
            window.location.href = href;
        }, 2000); // Delay 2000ms (2 detik)
    });
});

const list = document.querySelectorAll(".list");

function activeLink() {
    list.forEach((item) => item.classList.remove("active"));
    this.classList.add("active");
}
list.forEach((item) => item.addEventListener("click", activeLink));

// Mendapatkan elemen input date_of_birth
// Mendapatkan elemen input tanggal_lahir
var inputTanggalLahir = document.getElementById("date_of_birth");

// Menambahkan event listener untuk menghindari tanggal di masa depan
inputTanggalLahir.addEventListener("change", function () {
    var inputDate = new Date(this.value);
    var currentDate = new Date();

    // Membandingkan tanggal yang dimasukkan dengan tanggal sekarang
    if (inputDate > currentDate) {
        let timerInterval;
        Swal.fire({
            title: "Apakah Kamu Dari<br/>Masa Depan?",
            html: "Tanggal Lahir Tidak Boleh Lebih Dari Tanggal Sekarang",
            timer: 5000,
            timerProgressBar: true,
            didOpen: () => {
                Swal.showLoading();
                const b = Swal.getHtmlContainer().querySelector("b");
                timerInterval = setInterval(() => {
                    b.textContent = Swal.getTimerLeft();
                }, 100);
            },
            willClose: () => {
                clearInterval(timerInterval);
            },
        }).then((result) => {
            /* Read more about handling dismissals below */
            if (result.dismiss === Swal.DismissReason.timer) {
                console.log("I was closed by the timer");
            }
        });
        this.value = ""; // Mengosongkan input jika tanggal tidak valid
    }
});

function editProfileForm(initialPicture, initialPhone, initialDateOfBirth) {
    return {
        selectedPicture: initialPicture,
        phone: initialPhone,
        dateOfBirth: initialDateOfBirth,
        pictures: [
            {
                src: "/assets/icons/man-profile.webp",
            },
            {
                src: "/assets/icons/woman-profile.webp",
            },
        ],
        get isFormValid() {
            return this.selectedPicture && this.phone && this.dateOfBirth;
        },
    };
}

document.addEventListener("DOMContentLoaded", function () {
    new Rellax(".rellax");
});

document
    .getElementById("copy-link")
    .addEventListener("click", function (event) {
        event.preventDefault(); // Mencegah aksi default dari link

        // Text yang ingin disalin
        var textToCopy =
            "https://koprasismkn65.store/product/{{ $product->id }}";

        // Membuat elemen textarea sementara
        var textarea = document.createElement("textarea");
        textarea.value = textToCopy;
        document.body.appendChild(textarea);

        // Memilih dan menyalin teks ke clipboard
        textarea.select();
        textarea.setSelectionRange(0, 99999); // Untuk perangkat mobile
        document.execCommand("copy");

        // Menghapus elemen textarea sementara
        document.body.removeChild(textarea);

        // Tampilkan pesan konfirmasi
        var confirmation = document.getElementById("confirmation");
        confirmation.classList.remove("hidden");

        // Sembunyikan pesan konfirmasi setelah 3 detik
        setTimeout(function () {
            confirmation.classList.add("hidden");
        }, 3000);
    });
