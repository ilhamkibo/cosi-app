// resources/js/password-hide.js

// Fungsi untuk menampilkan password saat tombol ditekan
function showPassword() {
    var passwordInput = document.getElementById("password");
    var icon = document.getElementById("toggle-password-icon");

    passwordInput.type = "text"; // Tampilkan password

    // Ubah ikon menjadi eye-slash
    icon.classList.remove("fa-eye");
    icon.classList.add("fa-eye-slash");
}

// Fungsi untuk menyembunyikan password saat tombol dilepas atau pointer meninggalkan
function hidePassword() {
    var passwordInput = document.getElementById("password");
    var icon = document.getElementById("toggle-password-icon");

    passwordInput.type = "password"; // Sembunyikan password

    // Ubah ikon kembali ke eye
    icon.classList.remove("fa-eye-slash");
    icon.classList.add("fa-eye");
}

// Mendaftarkan event listener untuk tombol
document.addEventListener("DOMContentLoaded", function () {
    var togglePasswordButton = document.querySelector('[type="button"]');

    if (togglePasswordButton) {
        togglePasswordButton.addEventListener("mousedown", showPassword);
        togglePasswordButton.addEventListener("mouseup", hidePassword);
        togglePasswordButton.addEventListener("mouseleave", hidePassword);
    }
});
