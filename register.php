<?php
include('config.php'); // Sertakan file konfigurasi database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $npm = $_POST["npm"];
    $password = $_POST["password"];

    // Panggil fungsi register dari config.php
    $result = register($nama, $npm, $password);

    if ($result) {
        // Registrasi berhasil, gunakan JavaScript untuk menampilkan notifikasi
        echo '<script>';
        echo 'alert("Registrasi berhasil! Selamat bergabung, ' . $nama . '.");';
        echo 'window.location.href = "index.html";'; // Pindah ke halaman login setelah notifikasi
        echo '</script>';
    } else {
        // Registrasi gagal, mungkin karena NPM sudah terdaftar
        echo "Registrasi gagal. Silakan coba lagi dengan NPM yang berbeda.";
    }
}
?>
