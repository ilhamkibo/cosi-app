document.addEventListener("DOMContentLoaded", function () {
    // Cari semua tombol untuk toggle password
    const togglePasswordButtons = document.querySelectorAll('[type="button"]');

    togglePasswordButtons.forEach((button) => {
        const input = button.previousElementSibling; // Elemen input password
        const icon = button.querySelector("i"); // Ikon di dalam tombol

        if (!input || input.type !== "password") return; // Pastikan elemen valid

        // Saat tombol mouse ditekan (mousedown)
        button.addEventListener("mousedown", function () {
            input.type = "text"; // Ubah tipe input menjadi teks
            icon.classList.replace("fa-eye", "fa-eye-slash"); // Ubah ikon menjadi mata tertutup
        });

        // Saat tombol mouse dilepas (mouseup atau mouseleave)
        const hidePassword = () => {
            input.type = "password"; // Ubah kembali tipe input menjadi password
            icon.classList.replace("fa-eye-slash", "fa-eye"); // Ubah ikon menjadi mata terbuka
        };

        button.addEventListener("mouseup", hidePassword);
        button.addEventListener("mouseleave", hidePassword);
    });
});
