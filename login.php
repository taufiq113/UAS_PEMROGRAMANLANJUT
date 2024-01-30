<?php
include('config.php'); // Sertakan file konfigurasi database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $npm = $_POST["npm"];
    $password = $_POST["password"];

    // Panggil fungsi login dari config.php
    $user = login($npm, $password);

    if ($user) {
        // Login berhasil, arahkan ke halaman isi.php
        header("Location: login_sukses.php");
        exit();
    } else {
        // Login gagal, tampilkan pesan error
        echo "Login gagal. NPM atau kata sandi salah.";
    }
}
?>
